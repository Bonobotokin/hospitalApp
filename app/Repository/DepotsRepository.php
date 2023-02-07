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
                    'fabriquant' => $produit->fabriquant,
                    'types' => $produit->type_produits,
                    'categorie' =>$produit->categorie,
                    'abrev' =>$produit->abreviation_produits
                ];
            });

        return $depots;
    }

}