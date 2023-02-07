<?php

namespace App\Repository;
use Carbon\Carbon;
use App\Models\LivraisonProduits;
use App\Interfaces\LivraisonProduitsRepositoryInterface;

class LivraisonProduitsRepository implements LivraisonProduitsRepositoryInterface
{

    public function getAllByNum() {

        $livraison = LivraisonProduits::with('achatProduits')
                    ->select('num_livraison', 'created_at', 'validate_magasinier')
                    ->distinct()
                    ->get()
                    ->map(function ($livraison) {

                        $date = Carbon::parse($livraison->created_at)->format('m/d/Y');

                        return [
                            'num_livraison' => $livraison->num_livraison,
                            'date'=> $date,
                            'isValidate' => $livraison->validate_magasinier
                        ];
                    });

        return $livraison;

    }


    public function getListeNum(int $num)
    {
        $detail = LivraisonProduits::with('achatProduits','produit')
            ->where('num_livraison', $num)
            ->get()
            ->map(function ($detail) {
                $produits = $detail->produit;
                $date = Carbon::parse($detail->created_at)->format('m/d/Y');
                // dd($detail);
                return [
                    'num_livraison' => $detail->num_livraison,
                    'numFacture' => $detail->num_facture,
                    'designation' => $produits->designation_produits,
                    'conditionnements' => $detail->conditionnement_livraison,
                    'quantite' => $detail->quantiter_livraison,
                    'date' => $date,
                    'type' => $detail->type_livraison,
                    'prix' => $detail->prix_livraison,
                    'validate' => $detail->validate_magasinier
                ];

            });
        return $detail;
    }
    public function getByNumLivraison (int $num) {

        $livraison = LivraisonProduits::with('achatProduits')
                    ->where('num_livraison', $num)
                    ->get();
        return $livraison;

    }

}