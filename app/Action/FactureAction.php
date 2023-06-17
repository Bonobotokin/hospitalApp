<?php

namespace App\Action;

use App\Models\FactureDispensaire;
use App\Models\Caisse;
use Illuminate\Support\Facades\DB;



class FactureAction
{
    public function savePayement($request)
    {
        try {

            $data = DB::transaction(function () use ($request) {


                // dd($request, ((double) $request['montantPayed'] - (double) $request['restePayed']));
                $lookFacture = FactureDispensaire::where('num_facture_patient', $request['numFacture'])
                    ->get();
                foreach ($lookFacture as $facture) {
                    if ($request['montantPayed'] + $request['restePayed'] <  $request['totalMontantDefault']) {
                        $facture->prix_total = (float) $request['totalMontantDefault'] - (float) $request['montantPayed'];
                        $facture->montant = (float) $request['montantPayed'];
                        $facture->isNotPayed = false;
                        $facture->reste = (float) ($request['montantPayed'] - $request['restePayed'] );
                    } else if ($request['montantPayed'] > $request['totalMontantDefault'] || $request['montantPayed'] <= 0) {
                        dd($request,"eto");
                        return [
                            "data" => null,
                            "message" => "Erreur, calcule impossible"
                        ];
                    } else {
                        $facture->prix_total = $request['totalMontantDefault'];                       
                        $facture->montant = (float) $request['montantPayed'];
                        $facture->isNotPayed = true;
                        $facture->reste = 0;
                    }
                    $facture->save();
                }

                $caisse = $this->caisses($request);
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


    public function caisses($data)
    {

        $caisses = Caisse::create([
            'description' => $data['description'],
            'encaissement' => (float) $data['montantPayed'],
            'decaissement' => 0.00,
            'Ispaed' => true
        ]);
        return $caisses->id;
    }
}
