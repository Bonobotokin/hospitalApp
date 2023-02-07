<?php

namespace App\Action;

use App\Models\Livraison;
use App\Models\Fournisseur;
use App\Models\AchatProduit;
use App\Models\LivraisonProduits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\PersonnelRepository;
use App\Repository\AchatProduitsRepository;

class AchatProduitsAction
{
    private $achatProduitsRepository;

    private $personnelRepository;
    public function __construct(
        PersonnelRepository $personnelRepository,
        AchatProduitsRepository $achatProduitsRepository
    ){
        $this->personnelRepository = $personnelRepository;
        $this->achatProduitsRepository = $achatProduitsRepository;
    } 

    public function newAchatProduits($request)
    {
        try {
    
            $data = DB::transaction(function () use ($request) {
                // dd($request);
                $magasinierId = Auth::user()->id;

                $demandeur = $this->personnelRepository->getPersonnelConnected($magasinierId);

                $listeAchat = $request->listeAchat;
                
                for ($i = 0; $i < $listeAchat; $i++) {
                    
                    $achatProduits[$i] = AchatProduit::create([
                        'numAchat' => (int) $request->numAchat,
                        'demandeur' => (int) $demandeur[0]['id'],
                        'produit_id' =>  $request->$i['produits_id'],
                        'conditionnnement_achat' => $request->$i['conditionnement'],
                        'quantite_achat' => $request->$i['quantiteAchat'],
                        'prix_achat' => null,
                        'Isvalide' => false,
                        'personnelValidate' => null
                    ]);

                    $achatProduits_id = $achatProduits[$i]->numAchat;
                    $id_enregistrement = $achatProduits_id;
                }

                return [
                    "data" => $id_enregistrement,
                    "message" => " Votre Achat a ete bien enreigstrer"
                ];

            });

            return $data;

        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }


    public function livraisonAchat($request)
    {
        try {

            $data = DB::transaction(function () use ($request) {
                // dd($request);

                $nombreProduitsLivred = $request->listeAchatLivred;

                $reqFournisseur = $request->fournisseur;

                $forunisseur = $this->insertFournisseur($reqFournisseur);
                // dd($reqFournisseur);
                for ($i = 0; $i < (int) $nombreProduitsLivred; $i++) {
                    // dd($request->$i['produits_id']);
                    $idAchat = (int) $request->$i['achat_id'];

                    $numAchat = $request->$i['numAchat'];

                    $achatNum = $this->achatProduitsRepository->getBydAchatId($idAchat);
                    
                        $livraison = LivraisonProduits::create([

                            'num_livraison' => (int) $request->numeroLivraison,

                            'num_facture' => (int) $request->numFacture,

                            'numAchat' => (int) $achatNum[0]['numAchat'],

                            'conditionnement_livraison' => $request->$i['conditionnement'],

                            'quantiter_livraison' => $request->$i['quantite'],

                            'total_quantite_livraison' => $request->$i['total'],

                            'prix_livraison' => $request->$i['prix_achat'],

                            'type_livraison' => 'locale',

                            'fournisseur_id' => $forunisseur, // le fournisseur qui a effectuer la livraison

                            'produit_id' => $request->$i['produits_id'],

                            'validate_magasinier' => false
                            
                        ]);
                    
                    $UserId = Auth::user()->id;

                    $personnelValidate = $this->personnelRepository->tranPersonnelTovalidate($UserId);
                    
                    $changeAchat = AchatProduit::where('numAchat', (int) $numAchat)
                                                    ->get();
                    foreach($changeAchat as $saveAchat)
                    {
                        $saveAchat->prix_achat = $request->$i['prix_achat'];
                        $saveAchat->Isvalide = true;
                        $saveAchat->personnelValidate = $personnelValidate[0]['id'];
                        $saveAchat->save();
                    }

                    $id_enregistrement = $livraison;
                }
                
                return [
                    "data" => $id_enregistrement,
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