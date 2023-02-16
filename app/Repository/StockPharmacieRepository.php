<?php

namespace App\Repository;

use App\Interfaces\StockPharmacieRepositoryInterface;
use App\Models\StockPharmacie;

class StockPharmacieRepository implements StockPharmacieRepositoryInterface
{

    public function getAll()
    {

        $stoque = StockPharmacie::with('produit')
            ->get()
            ->map(function ($stoque) {

                $produits = $stoque->produit;
                // dd($stoque);
                return [
                    'num' => $stoque->produit_id,
                    'nom' => $produits->designation_produits,
                    'abrev' => $produits->abreviation_produits,
                    'quantite' => $stoque->quantite_pharmacie,
                    'conditionnement' => $stoque->conditionnement_pharmacie,
                    'type' =>  $produits->type_produits,
                    'categorie' => $produits->categorie,
                    'abrev' => $produits->abreviation_produits,
                    'pharmacien_id' => $stoque->pharmacien_id

                ];
            });

        return $stoque;
    }


    public function lookOfQuantite()
    {
        $stoque = StockPharmacie::with('produit')
            ->where('quantite_pharmacie', '<=', 50)
            ->get()
            ->map(function ($stoque) {

                $produits = $stoque->produit;
                // dd($stoque);
                return [
                    'num' => $stoque->produit_id,
                    'nom' => $produits->designation_produits,
                    'abrev' => $produits->abreviation_produits,
                    'quantite' => $stoque->quantite_pharmacie,
                    'conditionnement' => $stoque->conditionnement_pharmacie,
                    'type' =>  $produits->type_produits,
                    'categorie' => $produits->categorie,
                    'abrev' => $produits->abreviation_produits,
                    'pharmacien_id' => $stoque->pharmacien_id

                ];
            });

        return $stoque;
    }


    public function seeInNumExist()
    {
    }
}
