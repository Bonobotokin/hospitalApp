<?php

namespace App\Repository;

use App\Interfaces\PatientRepositoryInterface;
use App\Models\Patient;
use App\Models\PatientParametre;

class PatientRepository implements PatientRepositoryInterface
{
    public function get_all_not_hospitaled()
    {
        $patient = Patient::get()
            ->map(function ($patient) {

                return
                    [
                        'id' => $patient->id,
                        'matricule' => $patient->matricule,
                        'nom' => $patient->nom_patient,
                        'prenom' => $patient->prenom_patient,
                        'sexe' => $patient->sexe_patient,
                        'age' => $patient->Age_patient,
                        'contacte_patient' => $patient->contacte_patient,
                        'profession' => $patient->profession,
                    ];
            });
        // dd($patient);
        return $patient;
    }

    public function getParametrepatient(int $id)
    {
        $parametre = PatientParametre::with('patient')
            ->where('patient_id', $id)
            ->get()
            ->map(function ($parametre) {

                return [
                    'poids' => $parametre->poids,
                    'taills' => $parametre->taills,
                    'temperature' => $parametre->temperature,
                    'tension' => $parametre->tension,
                    'pouls' => $parametre->pouls,
                    'frequence' => $parametre->frequence,
                ];
            });


        return $parametre;
    }
}
