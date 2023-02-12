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

class CommandeAction {

    private $personnelRepository;
    private $livraisonPharmacieRepository;

    public function __construct(

        PersonnelRepository $personnelRepository,
        LivraisonPharmacieRepository $livraisonPharmacieRepository,

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

                $magasinier = $this->personnelRepository->getPersonnelConnected($magasinierId);

                

               if( $nombreCommande == 1 ) {
                    $quantite = $request[0]['quantite'];

                    $ifIsAsQuantite = $this->lookIs_Produit_As_Quantite($request[0]);
                    

                    if($ifIsAsQuantite == TRUE)
                    {
                        return [
                            "data" => null,
                            "message" => "Desoler, veuillez remplir votre depot "
                        ];
                    }
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
                        'type_livraison' => 'Interne',
                        'produit_id' => $commande->produit_id,
                        'validate_magasinier' => $commande->magasinier_id
                    ]);
                    
                    $stoquePharmacie = StockPharmacie::where('produit_id', $request->idProduits)
                                                ->get();
                    

                    $mvmStockPharmacie = mouvementPharmacie::create([
                        'stock_pharmacie_id' => $stoquePharmacie[0]['id'],
                        'magasinier_id' => $magasinier[0]['personnel_id'],
                        'quantite_mvm_pharmacie' => (int) $Livraison['quantiter_livraison'],
                        'type_mvm_pharmacie' => "entrant"
                    ]);
                    
                    $newEntrant = $Livraison->quantiter_livraison + $stoquePharmacie[0]['quantite_pharmacie'];

                    $entrant = StockPharmacie::find((int) $Livraison->produit_id);
                    $entrant->conditionnement_pharmacie = $Livraison->conditionnement_livraison;
                    $entrant->quantite_pharmacie = $newEntrant;
                    $entrant->save();

                    $CommandeId = $commande->id;
               }
               else
               {
                    
                    for ($i=0; $i < (int) $nombreCommande; $i++) { 
                        


                        $commande = CommandeProduit::create([
                            'num_commande' => $request->num_commande1,
                            'produit_id' => $request->$i['idProduits'],
                            'conditionnement_commande' => $request->$i['conditionnement'],
                            'qunantite_commande' => $request->$i['quantite'],
                            'observetion' => $request->$i['observation'],
                            'pharmacien_id' => $request->pharmacien_id,
                            'magasinier_id' => $magasinier[0]['personnel_id']
                        ]);

                        $numLivraisonIs = $this->getNumLivraison();
                        
                        $Livraison = MagasinPharmacieLivraison::create([
                            'num_livraison' =>  $numLivraisonIs,
                            'num_commande' => (int) $commande->num_commande,
                            'conditionnement_livraison' => $commande->conditionnement_commande,
                            'quantiter_livraison' => $commande->qunantite_commande,
                            'type_livraison' => 'Interne',
                            'produit_id' => $commande->produit_id,
                            'validate_magasinier' => $commande->magasinier_id
                        ]);
                        
                        $pharmacieStoque = StockPharmacie::get();
                        
                        // dd($pharmacieStoque);
                        $mvmStockPharmacie = mouvementPharmacie::create([
                            'stock_pharmacie_id' => $pharmacieStoque[0]['id'],
                            'magasinier_id' => $magasinier[0]['personnel_id'],
                            'quantite_mvm_pharmacie' => (int) $request->$i['quantite'],
                            'type_mvm_pharmacie' => "entrant"
                        ]);
                        // dd($pharmacieStoque[$i]['quantite_pharmacie']);
                        $entrantStock = $request->$i['quantite'] + $pharmacieStoque[$i]['quantite_pharmacie'];

                        $entrant = StockPharmacie::find((int) $Livraison->produit_id);
                        $entrant->conditionnement_pharmacie = $Livraison->conditionnement_livraison;
                        $entrant->quantite_pharmacie = $entrantStock;
                        $entrant->save();

                        $CommandeId = $commande->id;                        
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

    public function getNumLivraison () {
        $numIs = $this->livraisonPharmacieRepository->seeNumLivraisonIsIn();
                        
        if($numIs->isNotEmpty())
        {
                $numeroLivraison =  $numIs[0]['num_livraison'] + 1 ;

            return  $numeroLivraison;
        }
        else {
                $numeroLivraison = 1;

            return  $numeroLivraison;
        }
    }

    public function lookIs_Produit_As_Quantite($quantite)
    {
        $sortantDepots = DepotsAction::sortantdepots($quantite);

        return $sortantDepots;

    }
}