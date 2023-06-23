<?php

namespace App\Action;

use App\Models\Caisse;
use Illuminate\Support\Facades\DB;
use App\Models\Consultation;
use App\Models\DistributionPharmacie;
use App\Models\FactureDispensaire;
use App\Models\Posologie;
use App\Models\Prescription;
use App\Repository\PersonnelRepository;
use Illuminate\Support\Facades\Auth;


class FactureAction
{
    public function savePayement($request)
    {
        try {

            $data = DB::transaction(function () use ($request) {


                // dd($request['totalMontantDefault'] - $request['montantPayed']);
                $lookFacture = FactureDispensaire::where('id', $request['numFacture'])
                    ->get();
                // dd($lookFacture);
                if ($request['montantPayed'] == 0) {
                    return [
                        "data" => null,
                        "message" => "Erreur, le montant a payer ne peut pas etre vide "
                    ];
                } else if ($request['montantPayed'] > $request['totalMontantDefault']) {
                    return [
                        "data" => null,
                        "message" => "Erreur, le montant a payer est trop grand que la facture  "
                    ];
                } else {
                    foreach ($lookFacture as $facture) {
                        if ($request['montantPayed'] <  $request['totalMontantDefault']) {
                            $facture->montant = (float) $request['montantPayed'];
                            $facture->isNotPayed = true;
                            $facture->reste = (float) ($request['totalMontantDefault'] - $request['montantPayed']);
                        } else if ($request['totalMontantDefault'] - $request['montantPayed'] == 0) {
                            // $facture->prix_total = $request['totalMontantDefault'];                       
                            $facture->montant = (float) $request['montantPayed'];
                            $facture->isNotPayed = true;
                            $facture->reste = 0;
                        }
                        $facture->save();
                        // dd($facture->reste);
                        if ($facture->reste > 0) {
                            FactureDispensaire::create([
                                'montant' => 0,
                                'reste' => $request['restePayed'],
                                'isNotPayed' => false,
                                'consultation_id' => $facture->consultation_id
                            ]);
                        }
                        // dd($factureCreate);
                        $caisse = $this->caisses($request);
                    }

                    return [
                        "data" => $facture->id,
                        "message" => "Enregistrement de facture Reussit"
                    ];
                }
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


    public function updateFacture($request)
    {
        try {

            $data = DB::transaction(function () use ($request) {


                dd($request);
                exit;
                $nombreMedicaments = (int) $request->input('nombreMedicament');

                $consultation = Consultation::find($request->consultation_id);
                $consultation->consulted = true;
                $consultation->symptome = $request->symptomes;
                $consultation->diagnostique = $request->diagnostic;
                $consultation->save();

                // dd($consultation);exit;
                // On crée un tableau pour stocker les ids des prescriptions créées
                $prescriptionIds = [];

                for ($i = 0; $i < $nombreMedicaments; $i++) {

                    $medeque = $request->$i;

                    $prescription = Prescription::create([
                        'produit_id' => $medeque['produits_id'],
                        'quantite' => (int) $medeque['quantite'],
                        'medecin_id' => (int) $request->medecin_id,
                        'prix_unitaire' => (int) $medeque['prix'],
                        'prix_total' => (int) $medeque['prix'] *  (int) $medeque['quantite']
                    ]);

                    // On ajoute l'id de la prescription créée dans le tableau
                    $prescriptionIds[] = $prescription->id;

                    $posologie = Posologie::create([
                        'details_posologie' => $request->posologie,
                        'consultation_id' => $consultation->id
                    ]);

                    $distribution = DistributionPharmacie::create([
                        'pharmacien_id' => null,
                        'prescription_id' => $prescription->id,
                        'distribuer' => 0,
                        'reste' => 0
                    ]);

                    $facture = FactureDispensaire::create([
                        'num_facture_patient' => (int) $request->numFacture,
                        // 'prix_total' => 
                        'consultation_id' => $consultation->id
                    ]);
                }

                // On synchronise la relation many-to-many entre consultations et prescriptions
                $consultation->prescriptions()->sync($prescriptionIds);

                return [
                    "data" => $consultation->id,
                    "message" => "L'enregistrement de cette consultation a été bien enregistré"
                ];
            });


            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
