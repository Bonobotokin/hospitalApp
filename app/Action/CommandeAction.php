<?php

namespace App\Action;

use App\Models\CommandeProduit;
use App\Models\MagasinPharmacieLivraison;
use App\Models\mouvementPharmacie;
use App\Models\StockPharmacie;
use App\Action\DepotsAction;
use App\Repository\LivraisonPharmacieRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\PersonnelRepository;

class CommandeAction
{

    private $personnelRepository;
    private $livraisonPharmacieRepository;

    public function __construct(

        PersonnelRepository $personnelRepository,
        LivraisonPharmacieRepository $livraisonPharmacieRepository,

    ) {
        $this->personnelRepository = $personnelRepository;
        $this->livraisonPharmacieRepository = $livraisonPharmacieRepository;
    }

    public function newCommandeNotCommande($request)
    {

        try {

            $data = DB::transaction(function () use ($request) {

                $magasinierId = Auth::user()->id;

                $nombreCommande = $request->nombreCommande;

                $magasinier = $this->personnelRepository->getPersonnelConnected($magasinierId);
                
                $CommandeId = [];
                for ($i = 0; $i < (int) $nombreCommande; $i++) {

                    $ifIsAsQuantite = $this->lookIs_Produit_As_Quantite($request->$i);

                    if ($ifIsAsQuantite == TRUE) {
                        return [
                            "data" => null,
                            "message" => "Desoler, veuillez remplir votre depot "
                        ];
                    } else {

                        $commanded = $request->$i;
                        
                        $livraison = MagasinPharmacieLivraison::create([
                            'num_livraison' => 1,
                            'num_commande' => null,
                            'conditionnement_livraison' => $commanded['conditionnement'],
                            'quantiter_livraison' => $commanded['quantite'],
                            'total_livraison' => $commanded['total'],
                            'type_livraison' => 'Magasin Pharmacie',
                            'observation_livraison' => $commanded['observation'],
                            'produit_id' => $commanded['idProduits'],
                            'validate_magasinier' => $magasinier[0]['id']
                        ]);
                        
                        $stoquePharmacie = StockPharmacie::where('produit_id', $commanded['idProduits'])
                            ->get();

                        $getIdSortantDepot = DepotsAction::sortantdepots($livraison);
                        
                        if ($getIdSortantDepot === FALSE) {
                            return [
                                "data" => null,
                                "message" => "Desoler, votre de demanade ne peut pas fournir ce demande car votre demande est trop grand"
                            ];
                        } else {
                            
                            $mvmStockPharmacie = mouvementPharmacie::create([
                                'stock_pharmacie_id' => $stoquePharmacie[0]['id'],
                                'mouvement_depot_id' => $getIdSortantDepot,
                                'magasin_pharmacie_livraison_id' => $livraison->id,
                                'magasinier_id' => $magasinier[0]['personnel_id'],
                                'quantite_mvm_pharmacie' => (int) $livraison['total_livraison'],
                                'type_mvm_pharmacie' => "entrant"
                            ]);
                            
                            $newEntrant = $livraison->total_livraison + $stoquePharmacie[0]['quantite_pharmacie'];
                            
                            $entrant = StockPharmacie::where('produit_id', $livraison['produit_id'])->get();
                            
                            foreach ($entrant as $key => $dataUpdate) {
                                $dataUpdate->update([
                                    'conditionnement_pharmacie' => $livraison['conditionnement_livraison'],
                                    'quantite_pharmacie' => $newEntrant
                                ]);
                            }
                            

                            $CommandeId = $livraison->id;
                        }
                    }
                }

                return [
                    "data" => $CommandeId,
                    "message" => " Le Commande  a ete enregistrer et bien livrait "
                ];
            });

            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getNumLivraison()
    {
        $numIs = $this->livraisonPharmacieRepository->seeNumLivraisonIsIn();

        if ($numIs->isNotEmpty()) {
            $numeroLivraison =  $numIs[0]['num_livraison'] + 1;

            return  $numeroLivraison;
        } else {
            $numeroLivraison = 1;

            return  $numeroLivraison;
        }
    }

    public function lookIs_Produit_As_Quantite($quantite)
    {
        $sortantDepots = DepotsAction::depotHasQuantite($quantite);

        return $sortantDepots;
    }
}
