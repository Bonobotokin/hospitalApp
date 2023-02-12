<?php

namespace App\Repository;

use App\Interfaces\CommandeProduitRepositoryInterface;
use App\Models\CommandeProduit;

class CommandeRepository implements CommandeProduitRepositoryInterface {

    public function getGeneredNumCommande()
    {
        $generedNumber = CommandeProduit::select('num_commande')->distinct()->get();
        // dd($generedNumber[0]['num_commande']);
        return $generedNumber;
    }

    public function getAll()
    {
        $commande = CommandeProduit::with('produit')
                ->select('num_commande')
                ->get()
                ->map( function ($commande) {
                    return [
                        'numero' => $commande['num_commande']
                    ];
                });

        return $commande;
    }
}