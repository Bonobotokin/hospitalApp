<?php

namespace App\Action;

use App\Models\FactureDispensaire;
use Illuminate\Support\Facades\DB;

class FactureAction
{
    public function savePayement($request)
    {
        try {

            $data = DB::transaction(function () use ($request) {
                // dd($request);
                $facture = FactureDispensaire::find((int) $request['id']);
                $facture->montantPayer = (double) $request['montantPayed'];
                $facture->isNotPayed = true;
                $facture->resterPayed = 0.00;
                $facture->save();

                
                return [
                    "data" => $facture->id,
                    "message" => "Enregistrement de facture Reussit"
                ];
            });

            return $data;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
