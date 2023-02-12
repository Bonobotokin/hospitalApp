<?php

namespace App\Action;

use App\Models\Depot;
use App\Models\Fournisseur;
use App\Models\AchatProduit;
use App\Models\MouvementDepot;
use App\Models\LivraisonProduits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\PersonnelRepository;
use App\Repository\AchatProduitsRepository;
use App\Repository\LivraisonProduitsRepository;

class LivraisonAction
{

    private $livraisonProduitsRepository;
    private $personnelRepository;
    private $achatProduitsRepository;
    public function __construct(

        LivraisonProduitsRepository $livraisonProduitsRepository,
        PersonnelRepository $personnelRepository,
        AchatProduitsRepository $achatProduitsRepository

    ) {

        $this->livraisonProduitsRepository = $livraisonProduitsRepository;
        $this->personnelRepository = $personnelRepository;
        $this->achatProduitsRepository = $achatProduitsRepository;
    }


    public function updateDepot($request)
    {

        try {

            $livraisonAll = $this->livraisonProduitsRepository->getByNumLivraison($request->numLivraison);

            $magasinierId = Auth::user()->id;

            $data = DB::transaction(function () use ($livraisonAll, $magasinierId) {

            $magasinierValidate = $this->verifyUserIsMagasin($magasinierId);

                if (count($livraisonAll) == 1) {

                    $sendIsvalidate = LivraisonProduits::where('num_livraison', $livraisonAll[0]['num_livraison'])
                        ->get();

                    
                        foreach ($sendIsvalidate as $updateLivraison) {
                            $updateLivraison->validate_magasinier = $magasinierValidate;
                            $updateLivraison->save();
                        }


                        $depotsUpdate = Depot::where('id', $livraisonAll[0]['produit_id'])
                            ->get();
                    if (isset($depotsUpdate[0])) {

                        

                        $entrant = $depotsUpdate[0]['quantite_depots'] + $livraisonAll[0]['quantiter_livraison'];
                        
                        $newEntrantDepot = MouvementDepot::create([

                            'depot_id' => $depotsUpdate[0]['id'],
                            'fournisseur_id' => $livraisonAll[0]['fournisseur_id'],
                            'quantite_mouvement' => $entrant,
                            'type_mouvement'  => 'entrant'

                        ]);

                        $depots = Depot::find((int) $livraisonAll[0]['produit_id']);
                        $depots->conditionnement_depots = $livraisonAll[0]['conditionnement_livraison'];
                        $depots->quantite_depots = $entrant;
                        $depots->save();
                        

                    }

                    $id_enregistrement = $depotsUpdate[0]['id'];
                } else {


                    for ($i = 0; $i < count($livraisonAll); $i++) {

                        $sendIsvalidate = LivraisonProduits::where('num_livraison', $livraisonAll[$i]['num_livraison'])
                            ->get();


                        foreach ($sendIsvalidate as $updateLivraison) {
                            $updateLivraison->validate_magasinier = $magasinierValidate;
                            $updateLivraison->save();
                        }

                        $depotsUpdate = Depot::where('id', $livraisonAll[$i]['id'])
                            ->get();



                        if (isset($depotsUpdate[$i])) {
                            $newEntrantDepot[$i] = MouvementDepot::create([
                                'depot_id' => $depotsUpdate[$i]['id'],
                                'fournisseur_id' => $livraisonAll[$i]['fournisseur_id'],
                                'quantite_mouvement' => $livraisonAll[$i]['quantiter_livraison'],
                                'type_mouvement'  => 'entrant'
                            ]);

                            foreach ($depotsUpdate[$i] as $updateLivraison) {
                                $updateLivraison->conditionnement_depots = $livraisonAll[$i]['conditionnement_livraison'];
                                $updateLivraison->quantite_depots = $livraisonAll[$i]['quantiter_livraison'];
                                $updateLivraison->save();
                            }

                            $id_enregistrement = $depotsUpdate[$i];
                        }
                    }
                }
                return [
                    "data" => $id_enregistrement,
                    "message" => " votre Depot des Produist est bien a jour"
                ];
            });
            return $data;
        } catch (\Throwable $th) {

            return $th;
        }
    }


    public function verifyUserIsMagasin($magasinierId)
    {
        $magasinierConnetected = $this->personnelRepository->getPersonnelConnected($magasinierId);

        return $magasinierConnetected[0]['id'];
    }

    /**
     * Insert new Livraison From fournisseur Partenaria
     * @param \App\Http\Requests\StoreLivraisonProduitsRequest $request
     * 
     * 
     * */
    public function saveLivraisonPartenariat($request)
    {
        try {

            $data = DB::transaction(function () use ($request) {


                $nombreProduitsLivred = $request->listeAchat;

                $reqFournisseur = $request->fournisseur;

                $forunisseur = $this->insertFournisseur($reqFournisseur);

                for ($i = 0; $i < (int) $nombreProduitsLivred; $i++) {
                    // dd($request->$i['idProduits']);
                    $livraison = LivraisonProduits::create([

                        'num_livraison' => (int) $request->numeroLivraison,

                        'num_facture' => (int) $request->numFacture,

                        'numAchat' => null,

                        'conditionnement_livraison' => $request->$i['conditionnement'],

                        'quantiter_livraison' => $request->$i['quantite'],

                        'prix_livraison' => $request->$i['prix'],

                        'type_livraison' => 'partenariat',

                        'fournisseur_id' => $forunisseur, // le fournisseur qui a effectuer la livraison

                        'produit_id' => $request->$i['idProduits'],

                        'validate_magasinier' => false

                    ]);

                    $UserId = Auth::user()->id;

                    $personnelValidate = $this->personnelRepository->tranPersonnelTovalidate($UserId);
                    // dd($livraison->id);

                    $livraisonId = $livraison->id;
                }

                return [
                    "data" => $livraisonId,
                    "message" => " Votre Livraison a ete bien enreigstrer et envoyer"
                ];
            });

            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function insertFournisseur($forunisseur)
    {
        // dd($forunisseur);
        $createFournisseur = Fournisseur::create([
            'raison_sociale' => $forunisseur['raison'],
            'activite_fournisseur' => $forunisseur['activite'],
            'adresse_fournisseur' => $forunisseur['adresse'],
            'nif_fournisseur' => $forunisseur['nif'],
            'num_compte_fournisseur' => $forunisseur['numero'],
            'telephone_fournisseur' => $forunisseur['telephone']
        ]);

        $id = $createFournisseur->id;
        return $id;
    }
}
