<?php

namespace App\Action;

use App\Models\Caisse;
use App\Models\FactureDispensaire;
use Illuminate\Support\Facades\DB;

class FactureAction
{
    public function savePayement($request)
    {
        try {

            $data = DB::transaction(function () use ($request) {
                
                $facture = FactureDispensaire::find((int) $request['id']);
                $facture->montant = $request['montantPayed'];
                $facture->reste = $request['restePayed'];
                $facture->isNotPayed = true;
                $facture->save();
                // dd($request);
                $caisse = Caisse::updateOrCreate(
                    ['description' => $request['description']],
                    [
                        'encaissement' => (double) $request['montantPayed'],
                        'decaissement' => (double) 0.0,
                        'Ispaed' => true,
                    ]
                );
                
                // dd($caisse);
                return [
                    "data" => $facture->id,
                    "message" => "Le payement de la facture $facture->num_facture_patient a etait bien Reussit"
                ];
            });

            return $data;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
