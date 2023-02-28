<?php

namespace App\Repository;

use App\Interfaces\FactureRepositoryInterface;
use App\Models\Consultation;
use App\Models\FactureDispensaire;
use App\Models\Patient;
use App\Models\Prescription;

class FactureRepository implements FactureRepositoryInterface
{
    public function getAll()
    {
        $consultation = Consultation::with(['patient', 'prescription.produit'])
            ->whereHas('patient', function ($query) {
                $query->whereNotNull('id');
            })
            // ->where('isNotPayed', false)
            ->get()
            ->map(function ($consultation) {
                $patient = $consultation->patient;
                $ordonnance = $consultation->prescription->each(function($prescription) {
                    $medicament = [
                        'designation_produits' => $prescription->produit->designation_produits
                    ];

                    // dd($medicament);

                    return $medicament;
                    
                });
                return [
                    'id' => $patient->id,
                    'matricule' => $patient->matricule,
                    'nom' => $patient->nom_patient,
                    'prenom' => $patient->prenom_patient,
                    'sexe' => $patient->sexe_patient,
                    'age' => $patient->Age_patient,                    
                    // 'medicament' => $ordonnance['designation_produits'],
                ];
            });
        return $consultation;
    }
}
