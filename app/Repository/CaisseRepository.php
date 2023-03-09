<?php 

namespace App\Repository;

use App\Interfaces\CaisseRepositoryInterface;
use App\Models\Caisse;
use Carbon\Carbon;

class CaisseRepository implements CaisseRepositoryInterface 
{

    public function getEncaissementJournaliere()
    {
        $encaissement = Caisse::get()->map(function($encaissement) {

            return [
                'num' => $encaissement->id,
                'designation' => $encaissement->description,
                'montant' => $encaissement->encaissement,
                'date' => Carbon::parse($encaissement->created_at)->format('m/d/Y; H:m')
            ];

        });

        return $encaissement;
    }

}