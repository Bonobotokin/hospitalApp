<?php

namespace App\Repository;

use App\Interfaces\ConsultationRepositoryInterface;
use Illuminate\Support\Facades\DB;

use App\Models\Consultation;
use Carbon\Carbon;
use Date;

class ConsultationRepository implements ConsultationRepositoryInterface
{
    public function getAll()
    {
        $consultation = Consultation::with('patient', 'consultationType')
            // ->where('consultations.created_at', '=', $date_now)
            // ->orderBy('num_consultation','DESC')
            ->get()
            ->map(function ($consultation) {
                $typeConsultation = $consultation->consultationType;
                $patient = $consultation->patient;
                dd($consultation);
                return
                    [
                        'matricule' => $patient->matricule,
                        'id' => $consultation->id,
                        'num_patient' => $patient->id,
                        'nom' => $patient->nom_patient,
                        'prenom' => $patient->prenom_patient,
                        'sexe' => $patient->sexe_patient,
                        'age' => $patient->Age_patient,
                        'contacte_patient' => $patient->contacte_patient,
                        'profession' => $patient->profession,
                        'type_consultation' => $typeConsultation->type_consultaion,
                        // 'consultation' => $consultation->id,
                        'date_enregistrement' => Carbon::parse($consultation->created_at)->format('Y-m-d')
                    ];
            });
        // dd($consultation);
        return $consultation;
    }

    public function get_patient_consultation_to_day()
    {
        $consultation = Consultation::with('patient', 'consultationType','medecin')
            // ->where('consultations.created_at', '=', $date_now)
            ->orderBy('id','DESC')
            ->get()
            ->map(function ($consultation) {
                $typeConsultation = $consultation->consultationType;
                $patient = $consultation->patient;

                $medecin = $consultation->medecin->personnel;
                
                return
                    [
                        'matricule' => $patient->matricule,
                        'id' => $consultation->id,
                        'num_patient' => $patient->id,
                        'nom' => $patient->nom_patient,
                        'prenom' => $patient->prenom_patient,
                        'sexe' => $patient->sexe_patient,
                        'age' => $patient->Age_patient,
                        'contacte_patient' => $patient->contacte_patient,
                        'profession' => $patient->profession,
                        'type_consultation' => $typeConsultation->type_consultaion,
                        'consultation' => $consultation->id,
                        'etat_consultation' => $consultation->consulted,
                        'medecin' => $medecin->personnel,
                        'nom_medecin' =>$medecin->nom_personneles,
                        'date_enregistrement' => Carbon::parse($consultation->created_at)->format('Y-m-d')
                    ];
            });
        
        return $consultation;
    }
    /**
     *
     * Get all date iin Tables Consultation
     *
     *
     */
    public function date_consultation()
    {

        $date_now = Carbon::parse(now())->format('Y-m-d');
        return $date_now;
    }

    public function getPatientById(int $id)
    {
        // dd($id);
        $patientConsultation = Consultation::with('patient', 'consultationType','medecin')
            ->where('id', '=', $id)
            ->get()
            ->map( function($patientConsultation) {
                $typeConsultation = $patientConsultation->consultationType;
                $patient = $patientConsultation->patient;

                $medecin = $patientConsultation->medecin;
                // dd($medecin);
                return
                    [
                        'consultation_id' => $patientConsultation->id,
                        'prix' => $patientConsultation->prix,
                        'patient_id' => $patient->id,
                        'matricule' => $patient->matricule,
                        'id' => $patientConsultation->id,
                        'num_patient' => $patient->id,
                        'nom' => $patient->nom_patient,
                        'prenom' => $patient->prenom_patient,
                        'sexe' => $patient->sexe_patient,
                        'age' => $patient->Age_patient,
                        'contacte_patient' => $patient->contacte_patient,
                        'profession' => $patient->profession,
                        'type_consultation' => $typeConsultation->type_consultaion,
                        'type_consultation_id' => $typeConsultation->id,
                        'consultation' => $patientConsultation->id,
                        'etat_consultation' => $patientConsultation->consulted,
                        'medecin' => $medecin->id,
                        // 'nom_medecin' =>$medecin->nom_personneles,
                        'date_enregistrement' => Carbon::parse($patientConsultation->created_at)->format('Y-m-d')
                    ];

            });
        return $patientConsultation;
    }
}
