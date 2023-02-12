<?php

namespace App\Repository;
use App\Interfaces\DepotsRepositoryInterface;
use App\Models\Depot;

class DepotsRepository implements DepotsRepositoryInterface
{

    public function getAll()
    {
        $depots = Depot::with('produit')
            ->get()
            ->map(function ($depots) {

                $produit = $depots->produit;
                
                return [
                    'num' => $depots->produit_id,
                    'nom' =>    $produit->designation_produits,
                    'prix_vente' => $produit->prix_vente_produits,
                    'conditionnement' => $depots->conditionnement_depots,
                    'quantite' => $depots->quantite_depots,
                    'fabriquant' => $produit->fabriquant,
                    'types' => $produit->type_produits,
                    'categorie' =>$produit->categorie,
                    'abrev' =>$produit->abreviation_produits
                ];
            });

        return $depots;
    }


    public static function produitsHasQuantite(int $id)
    {
        $depots = Depot::select('quantite_depots')

            ->where('produit_id', $id)
            ->get();

        return $depots;
    }

}