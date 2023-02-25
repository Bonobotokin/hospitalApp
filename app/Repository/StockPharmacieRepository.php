<?php

namespace App\Repository;

use App\Interfaces\StockPharmacieRepositoryInterface;
use App\Models\Depot;
use App\Models\StockPharmacie;

class StockPharmacieRepository implements StockPharmacieRepositoryInterface
{

    public function getAll()
    {

        $stoque = StockPharmacie::with('produit')
            ->get()
            ->map(function ($stoque) {

                $produits = $stoque->produit;

                return [
                    'num' => $stoque->produit_id,
                    'nom' => $produits->designation_produits,
                    'abrev' => $produits->abreviation_produits,
                    'quantite' => $stoque->quantite_pharmacie,
                    'conditionnement' => $stoque->conditionnement_pharmacie,
                    'type' =>  $produits->type_produits,
                    'categorie' => $produits->categorie,
                    'abrev' => $produits->abreviation_produits,
                    'prix' => $produits->prix_vente_produits,
                    'pharmacien_id' => $stoque->pharmacien_id

                ];
            });

        return $stoque;
    }




    // $stoque = StockPharmacie::with('produit')
    //     ->where('quantite_pharmacie', '<', 50)
    //     ->get()
    //     ->map(function ($stoque) {
    //         $produits = $stoque->produit;
    //         // dd($stoque);
    //         return [
    //             'num' => $stoque->produit_id,
    //             'nom' => $produits->designation_produits,
    //             'abrev' => $produits->abreviation_produits,
    //             'quantite' => $stoque->quantite_pharmacie,
    //             'conditionnement' => $stoque->conditionnement_pharmacie,
    //             'type' =>  $produits->type_produits,
    //             'categorie' => $produits->categorie,
    //             'abrev' => $produits->abreviation_produits,
    //             'pharmacien_id' => $stoque->pharmacien_id

    //         ];
    //     });

    // return $stoque;
    public function lookOfQuantite()
    {
        $stocks = StockPharmacie::with('produit')
            ->where('quantite_pharmacie', '<', 50)
            ->get()
            ->map(function ($stock) {
                return [
                    'produit_id' => $stock->produit_id,
                    'quantite' => $stock->quantite_pharmacie,
                ];
            });

            $depots = Depot::with('produit')
            ->whereIn('produit_id', $stocks->pluck('produit_id'))
            ->get()
            ->map(function ($depot) use ($stocks) {
                $stock = $stocks->firstWhere('produit_id', $depot->produit_id);
                $depot->quantite_stock_pharmacie = $stock ? $stock['quantite'] : 0;
                $depot->produit_id = $depot->produit->id;
                return [
                    'produit_id' => $depot->produit_id,
                    'nom' => $depot->produit->designation_produits,
                    'conditionnement' => $depot->conditionnement_depots,
                    'quantite' => $depot->quantite_depots,
                    'categorie' => $depot->produit->categorie,
                    'quantite_stock_pharmacie' => $depot->quantite_stock_pharmacie,
                    'pharmacien_id' => $depot->pharmacien_id
                ];
            });
        // dd($depots);
        return $depots; 
    }




    public function seeInNumExist()
    {
    }
}
