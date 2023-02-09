<?php 

namespace App\Repository;

use App\Interfaces\StockPharmacieRepositoryInterface;
use App\Models\StockPharmacie;

class StockPharmacieRepository implements StockPharmacieRepositoryInterface {

    public function getAll() {

        $stoque = StockPharmacie::with('produit')
            ->get()
            ->map(function($stoque){
                
                $produits = $stoque->produit;  
                
                return [
                    'nom' => $produits->designation_produits,
                    'abrev' => $produits->abreviation_produits,
                    'quantite' => $stoque->quantite_pharmacie,
                    'conditionnement' => $stoque->conditionnement_pharmacie,
                    'type' =>  $produits->type_produits
                ];

            });

        return $stoque;

    }

}