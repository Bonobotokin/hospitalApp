<?php

namespace App\Repository;

use App\Interfaces\CommandeProduitRepositoryInterface;
use App\Models\CommandeProduit;

class CommandeRepository implements CommandeProduitRepositoryInterface {

    public function getGeneredNumCommande()
    {
        $generedNumber = CommandeProduit::select('num_commande')->get()
            ->map( function ($generedNumber) {
                return [
                    'num_commande' => $generedNumber
                ];
            });
        return $generedNumber;
    }
}