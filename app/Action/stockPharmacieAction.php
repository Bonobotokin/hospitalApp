<?php

namespace App\Action;

use App\Models\Depot;
use App\Models\mouvementPharmacie;
use App\Models\StockPharmacie;
use App\Repository\StockPharmacieRepository;

class stockPharmacieAction
{
    private $stockPharmacieRepository;

    public function __construct(
        StockPharmacieRepository $stockPharmacieRepository
    ) {
        $this->stockPharmacieRepository = $stockPharmacieRepository;
    }

    public static function sortantstock($data)
    {
        // dd($data);
        $dataId = (int) $data['produits_id'];
        $dataQuantite = (int) $data['produits_quantite'];

        $produitInStock = StockPharmacieRepository::produitStoque($dataId);

        $produitId = $produitInStock['produit_id'];
        
        $quantiteProduits = $produitInStock['quantite'];

        if ( $dataQuantite > $quantiteProduits) {
            return false;
        } else {
            $sortieStock =  StockPharmacie::find($dataId);
            $dataSorti = $sortieStock['quantite_pharmacie'] - $dataQuantite;


            $sortieStock->update(
                [
                    'quantite_pharmacie' => $dataSorti
                ]
            );
            
            $newMvmStockPharmacie = mouvementPharmacie::create([
                'stock_pharmacie_id' => $sortieStock->id,
                'mouvement_depot_id' => null,
                'magasin_pharmacie_livraison_id' => null,
                'quantite_mvm_pharmacie' => $sortieStock->quantite_pharmacie ,
                'type_mvm_pharmacie' => "sortie"
            ]);

            return $newMvmStockPharmacie->id;

        }


    }

}