<?php

namespace App\Repository;

use App\Interfaces\StockPharmacieRepositoryInterface;
use App\Models\Depot;
use App\Models\StockPharmacie;
use App\Models\DistributionPharmacie;
use App\Models\DistributionPrescriptions;
use App\Models\FactureDispensaire;

class StockPharmacieRepository implements StockPharmacieRepositoryInterface
{

    public function getAll()
    {

        $stoque = StockPharmacie::with('produit')
            ->get()
            ->where('quantite_pharmacie', '>', 50)
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

    public static function produitStoque(int $id)
    {
        // verrifie if produits in stoque and if is quantite is > 10
        $stock = StockPharmacie::with('produit')
            ->where('produit_id', $id)
            ->where('quantite_pharmacie', '>', 10)
            ->get()
            ->map(function ($stock) {

                $produit = $stock->produit;
                
                return [
                    'produit_id' => $stock->produit_id,
                    'quantite' => $stock->quantite_pharmacie,
                ];
            });

        return $stock;
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




    //     public function listeDistribution()
    //     {
    //         $data = DistributionPrescriptions::with([
    //             'distributionPharmacie',
    //             'prescription',
    //             'prescription.consultations',
    //             'prescription.produit',
    //             'factureDispensaire',
    //         ])
    //         ->orWhereHas('factureDispensaire', function($query){
    //            $query->where('isNotPayed', true);
    //        })
    //         ->distinct()
    //         ->get();



    //         $distribution = $data->groupBy(function ($data) {

    //             $facture = $data->factureDispensaire;
    //             $prescriptions = $data->prescriptions;
    //             $consultations = $data->prescriptions->consultations;
    //             $patient = $consultations->patient;
    //             return $patient->matricule . '-' . $consultations->id;
    //         })->map(function ($groupedProduits, $key) {
    //             $distribution = $groupedProduits->first();
    //             $consultation = $distribution->consultations;
    //             $prescriptions = $consultation->prescriptions;
    //             $produits = $prescriptions->map(function ($prescription) {
    //                 $produit = $prescription->produit;
    //                 return [
    //                     'produit_nom' => $produit->designation_produits,
    //                     'quantite' => $prescription->quantite,
    //                     'categorie' => $produit->categorie,
    //                     'prix_unitaire' => $produit->prix_vente_produits,
    //                     'prix_totale' => $prescription->prix_total,
    //                 ];
    //             });

    //             return [
    //                 'id' => $distribution->id
    //             ];

    //         });

    //         dd($data);
    //     }

    
}
