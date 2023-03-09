<?php

namespace App\Repository;

use App\Models\Produit;
use App\Models\Produits;
use App\Interfaces\ProduitsRepositoryInterface;


class ProduitsRepository implements ProduitsRepositoryInterface
{

    public function getIdMagasinier(int $id):void
    {

    }

    public function getAll()
    {
        $produit = Produit::All()
            ->map(function ($produit) {
                                // dd($produit);
                                return [
                                    'num' =>    $produit->id,
                                    'nom' =>    $produit->designation_produits,
                                    'prix_vente' => $produit->prix_vente_produits,
                                    'fabriquant' => $produit->fabriquant,
                                    'types' => $produit->type_produits,
                                    'categorie' =>$produit->categorie,
                                    'abrev' =>$produit->abreviation_produits
                                ];
                            });
        return  $produit;
    }
}