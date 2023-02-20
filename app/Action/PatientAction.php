<?php

namespace App\Action;

use App\Models\Consultation;
use App\Models\Patient;
use App\Models\PatientParametre;
use Illuminate\Support\Facades\DB;

class PatientAction
{

    public function add_hadle_patient($request)
    {

        try {
            $data = DB::transaction(function () use ($request) {

                $patientRequest = $request->patient;
                $parametreRequest = $request->parametres;
                $consultation_data = $request->consultantion;
                
                $patient = Patient::Create([
                    'matricule' => $patientRequest['matricule'],
                    'nom_patient' => $patientRequest['nom_patient'],
                    'prenom_patient' => is_null($patientRequest['prenom_patient']) ? null : $patientRequest['prenom_patient'],
                    'sexe_patient' => $patientRequest['sexe_patient'],
                    'Age_patient' => (int) $patientRequest['age_patient'],
                    'telephone_1_patient' => (int) $patientRequest['telephone_1_patient'],
                    'telephone_2_patient' => (int) $patientRequest['telephone_2_patient'],
                    'profession_patient' => $patientRequest['profession_patient'],
                    'adresse_patient' => $patientRequest['adresse_patient'],
                    'situation_matrimoniale_patient' => $patientRequest['situation_matrimoniale_patient'],
                    'nomPere_patient' => $patientRequest['nomPere_patient'],
                    'nomMere_patient' => $patientRequest['nomMere_patient'],
                    'nomPere_reference_patient' => $patientRequest['nomPere_reference_patient'],
                    'telephone_reference_patient' => $patientRequest['telephone_reference_patient'],
                    'IsHospitaled' => 0
                ]);

                $patient_id = $patient->id;

                $parametre = PatientParametre::Create([
                    'patient_id' => $patient_id,
                    'poids' => (int) $parametreRequest['poids'],
                    'taills' => (int) $parametreRequest['taille'],
                    'temperature' => (int) $parametreRequest['temperature'],
                    'tension' => (int) $parametreRequest['tension'],
                    'pouls' => (int) $parametreRequest['pouls'],
                    'frequence' => (int) $parametreRequest['frequence']
                ]);

                $parametre_id = $parametre->id;

                $consultation = Consultation::Create([
                    'patient_id' => $patient_id,
                    'type_consultation_id' => $consultation_data['type_consultation'],
                    'medecin_id' => $request->medecin_conultation
                ]);

                $consultation_id = $consultation->id;
                
                return [

                    "data"    => $consultation_id,
                    "message" => "L'insertion  de $patient->nom_patient $patient->prenom_patient a été bien effectué",
                ];
            });

            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function conslutation_isset($data)
    {
        dd($data);
        if (isset($data['type_consultaion_1'])) {

            return (int) $data['type_consultaion_1'];

        } else if (isset($data['type_consultaion_2'])) {

            return (int) $data['type_consultaion_2'];
        } 
    }
}
