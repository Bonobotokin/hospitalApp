<?php

namespace App\Repository;

use App\Interfaces\DistributionInterface;
use App\Models\DistributionPharmacie;
use Carbon\Carbon;

class DistributionRepository implements DistributionInterface
{
    public function listeDistribution()
    {
        $data = DistributionPharmacie::with([
            'consultation',
            'factureDispensaire'
        ])
            ->orWhereHas('factureDispensaire', function ($query) {
                $query->where('isNotPayed', true);
            })
            ->where('isDistribued', false)
            ->get()
            ->map(function ($data) {

                $patient = $data->consultation->patient;
                return [
                    'id' => $data->id,
                    'consultation_id' => $data->consultation->id,
                    'matricule' => $patient->matricule,
                    'patient_nom' => $patient->nom_patient,
                    'patient_prenom' => $patient->prenom_patient,
                    'etat' => $data->isDistribued
                ];
            });

        return $data;
        // return $facturesInfo;
    }
    // public function getPrescription(int $id)
    // {
    //     $data = DistributionPharmacie::with([
    //         'consultation.patient',
    //         'consultation.prescriptions.produit'
    //     ])
    //         ->where('consultation_id', $id)
    //         ->get();

    //     $prescriptionInfo = $data->groupBy(function ($distribution) {
    //         $consultation = $distribution->consultation->first();
    //         $patient = $consultation->patient;
    //         return $patient->matricule; // Group by patient's matricule
    //     })->map(function ($groupedData) use ($id) {
    //         $distribution = $groupedData->first(function ($item) use ($id) {
    //             return $item->consultation_id === $id;
    //         });

    //         $consultation = $distribution->consultation->first();
    //         $patient = $consultation->patient;
    //         $prescriptions = $consultation->prescriptions;

    //         $produits = $prescriptions->map(function ($prescription) {
    //             $produit = $prescription->produit;
    //             return [
    //                 'produit_nom' => $produit->designation_produits,
    //                 'quantite' => $prescription->quantite,
    //                 'categorie' => $produit->categorie
    //             ];
    //         });

    //         return [
    //             'id' => $distribution->id,
    //             'consultation' => [
    //                 'id' => $consultation->id,
    //                 'patient_matricule' => $patient->matricule,
    //                 'patient_nom' => $patient->nom_patient . " " . $patient->prenom_patient,
    //             ],
    //             'produits' => $produits,
    //         ];
    //     });

    //     return $prescriptionInfo;
    // }

    public function getPrescription(int $id)
    {
        $data = DistributionPharmacie::with('consultation')
            ->where('consultation_id', $id)
            ->where('isDistribued', false)
            ->get();

        $prescriptionInfo = $data->groupBy(function ($distribution) {
            $consultation = $distribution->consultation;
            $patient = $consultation->patient;
            return 'dataDetails';
        })->map(function ($groupedData, $matricule) {
            $distribution = $groupedData->first();
            $consultation = $distribution->consultation;
            $patient = $consultation->patient;
            $prescriptions = $consultation->prescriptions;

            $produits = $prescriptions->map(function ($prescription) {
                $produit = $prescription->produit;
                return [
                    'id' => $produit->id,
                    'produit_nom' => $produit->designation_produits,
                    'quantite' => $prescription->quantite,
                    'categorie' => $produit->categorie
                ];
            });

            return [
                'id' => $distribution->id,
                'matricule' => $patient->nom_patient,
                'patient_nom' => $patient->nom_patient,
                'produits' => $produits,
            ];
        });

        return $prescriptionInfo;
    }
}
