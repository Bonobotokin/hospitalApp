<?php

namespace App\Action;

use App\Models\Depot;
use App\Models\MouvementDepot;
use App\Models\LivraisonProduits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\LivraisonProduitsRepository;
use App\Repository\PersonnelRepository;

class LivraisonAction {

    private $livraisonProduitsRepository;
    private $personnelRepository;

    public function __construct(

        LivraisonProduitsRepository $livraisonProduitsRepository,
        PersonnelRepository $personnelRepository

    ){

        $this->livraisonProduitsRepository = $livraisonProduitsRepository;
        $this->personnelRepository = $personnelRepository;

    }


    public function updateDepot ($request) {

        try 
        {
            $livraisonAll = $this->livraisonProduitsRepository->getByNumLivraison($request->numLivraison);

            $magasinierId = Auth::user()->id;
            // dd($livraisonAll);
            $data = DB::transaction(function () use ($livraisonAll, $magasinierId) {

                
                for ($i=0; $i < count($livraisonAll); $i++) 
                { 

                    $sendIsvalidate[$i] = LivraisonProduits::where('num_livraison', $livraisonAll[$i]['num_livraison'])
                                                    ->get();

                    $magasinierValidate = $this->verifyUserIsMagasin($magasinierId);
                    
                    foreach($sendIsvalidate[$i] as $updateLivraison)
                    {
                        $updateLivraison->validate_magasinier = $magasinierValidate;
                        $updateLivraison->save();
                    }

                    $depotsUpdate[$i] = Depot::where('id', $livraisonAll[$i]['id'])
                                            ->get();
                    
                    if(($depotsUpdate[$i])) 
                    {
                        $newEntrantDepot[$i] = MouvementDepot::create([
                            'depot_id' => $depotsUpdate[$i][0]['id'],
                            'fournisseur_id' => $livraisonAll[$i]['fournisseur_id'],
                            'quantite_mouvement' => $livraisonAll[$i]['quantiter_livraison'],
                            'type_mouvement'  => 'entrant'
                        ]);

                        foreach($depotsUpdate[$i] as $updateLivraison)
                        {
                            $updateLivraison->conditionnement_depots = $livraisonAll[$i]['conditionnement_livraison'];
                            $updateLivraison->quantite_depots = $livraisonAll[$i]['quantiter_livraison'];
                            $updateLivraison->save();
                        }

                        $id_enregistrement = $depotsUpdate[$i];
                        
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
}