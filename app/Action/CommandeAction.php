<?php

namespace App\Action;

use App\Models\CommandeProduit;
use App\Models\MagasinPharmacieLivraison;
use App\Repository\LivraisonPharmacieRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\PersonnelRepository;

class CommandeAction {

    private $personnelRepository;
    private $livraisonPharmacieRepository;
    public function __construct(

        PersonnelRepository $personnelRepository,
        LivraisonPharmacieRepository $livraisonPharmacieRepository

    )
    {
        $this->personnelRepository = $personnelRepository;
        $this->livraisonPharmacieRepository = $livraisonPharmacieRepository;
    }

    public function commandeAction ($request)
    {


        try {
            
            $data = DB::transaction(function () use ($request) 
            {
                $magasinierId = Auth::user()->id;

                $nombreCommande = $request->nombreCommande;

               if( $nombreCommande == 1 ) {

                    $magasinier = $this->personnelRepository->getPersonnelConnected($magasinierId);
                    
                    $commande = CommandeProduit::create([
                        'num_commande' => $request->num_commande2,
                        'produit_id' => $request->idProduits ,
                        'conditionnement_commande' => $request->conditionnement,
                        'qunantite_commande' => $request->quantite,
                        'observetion' => $request->observation,
                        'pharmacien_id' => $request->pharmacien_id,
                        'magasinier_id' => $magasinier[0]['personnel_id']
                    ]);
                    $numIs = $this->livraisonPharmacieRepository->seeNumLivraisonIsIn();
                                       
                    $Livraison = MagasinPharmacieLivraison::create([
                        'num_livraison' => 1,
                        'num_commande' => (int) $commande->num_commande,
                        'conditionnement_livraison' => $commande->conditionnement_commande,
                        'quantiter_livraison' => $commande->qunantite_commande,
                        'type_livraison' => $commande->Interne,
                        'produit_id' => $commande->produit_id,
                        'validate_magasinier' => $commande->magasinier_id
                    ]);

                    $CommandeId = $commande->id;
               }

               return [
                    "data" => $CommandeId,
                    "message" => " Le Commande  a ete enregistrer et la livraison reussit "
                ];

            });

            return $data;

        } catch (\Throwable $th) {
            return $th;
        }
    }
}