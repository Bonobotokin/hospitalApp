<?php

namespace App\Repository;

use App\Interfaces\ExamenRepositoryInterface;
use App\Models\ConclusionExamen;
use App\Models\Consultation;
use App\Models\consultationExamenPrescription;
use App\Models\Examen;
use App\Models\ExamenLaboratoire;
use Carbon\Carbon;

class ExamenRepository implements ExamenRepositoryInterface
{

    public function getExamenConsultation(int $id)
    {
        $examens = Examen::with(['consultations'])
            ->whereHas('consultations.patient', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->get()
            ->map(function ($examen) {
                return [
                    'id' => $examen->id,
                    'examen_laboratoire_id' => $examen->examen_laboratoire_id ?? null
                ];
            });

        $laboratoire = [];
        $totalPrix = 0; // Variable pour stocker la somme des prix

        foreach ($examens as $key => $data) {
            $examenLaboratoire = ExamenLaboratoire::where('id', $data['examen_laboratoire_id'])
                ->get()
                ->map(function ($examenLaboratoire) use (&$totalPrix) { // Utilisation de la référence pour mettre à jour la somme des prix
                    $totalPrix += $examenLaboratoire->prix_examen; // Ajouter le prix à la somme totale

                    return [
                        'id' => $examenLaboratoire->id,
                        'designation_examens_labo' => $examenLaboratoire->designation_examens_labo,
                        'prix' => $examenLaboratoire->prix_examen,
                        'total' => is_null($totalPrix) ? " " : $totalPrix
                    ];
                });

            $laboratoire[] = $examenLaboratoire;
        }

        return $laboratoire;
    }

    public function getExamenLaboratoireAll()
    {
        $consultation = Consultation::with(['patient', 'consultationType', 'examens', 'medecin.personnel'])
            ->whereHas('examens', function ($query) {
                $query->where('finished', 0);
            })
            ->get()
            ->map(function ($consultation) {
                $typeConsultation = $consultation->consultationType;
                $patient = $consultation->patient;
                $examensLaboratoire = $consultation->examens;
                $medecin = $consultation->medecin->personnel;
                $examens = $examensLaboratoire->map(function ($examen) {
                    $laboExamen = $examen->examenLaboratoire;
                    return [
                        'id' => $laboExamen->id,
                        'designation_examens_labo' => $laboExamen->designation_examens_labo,
                        'prix_examen' => $laboExamen->prix_examen
                    ];
                });

                // dd($examens);
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
                        'examen' => $examens,
                        'medecin' => " Dr " . $medecin->nom_personneles,
                        'date_enregistrement' => Carbon::parse($consultation->created_at)->format('Y-m-d')
                    ];
            });
        // dd($consultation);
        return $consultation;
    }

    public function getExamen(int $id)
    {
        $consultation = Consultation::with(['patient', 'examens', 'medecin.personnel'])
            ->where('id', $id)
            ->get()
            ->map(function ($consultation) {
                $typeConsultation = $consultation->consultationType;
                $patient = $consultation->patient;
                $examensLaboratoire = $consultation->examens;
                $medecin = $consultation->medecin->personnel;
                $examens = $examensLaboratoire->map(function ($examen) {
                    $laboExamen = $examen->examenLaboratoire;
                    return [
                        'id' => $laboExamen->id,
                        'designation_examens_labo' => $laboExamen->designation_examens_labo,
                        'categorie_examens_labo' => $laboExamen->categorie_examens_labo,
                        'valeurs_referrences' => is_null($laboExamen->valeurs_referrences) ? " " : $laboExamen->valeurs_referrences,
                        'Unite' => is_null($laboExamen->Unite) ? " " : $laboExamen->Unite,
                        'prix_examen' => $laboExamen->prix_examen,
                    ];
                });

                // dd($examens);
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
                        'examen' => $examens,
                        'medecin' => " Dr " . $medecin->nom_personneles,
                        'date_enregistrement' => Carbon::parse($consultation->created_at)->format('Y-m-d')
                    ];
            });
        // dd($consultation);
        return $consultation;
    }

    public function getListeExamenLaboratoire()
    {
        $liste = ExamenLaboratoire::get();

        return $liste;
    }

    public function getDataExamen(int $id)
    {
        $data = ExamenLaboratoire::where('id', $id)
            ->get()
            ->map(function ($data) {
                return [
                    'id' => $data->id,
                    'designation_examens_labo' => $data->designation_examens_labo,
                    'categorie_examens_labo' => $data->categorie_examens_labo,
                    'valeurs_referrences' => is_null($data->valeurs_referrences) ? " " : $data->valeurs_referrences,
                    'Unite' => is_null($data->Unite) ? " " : $data->Unite,
                    'prix_examen' => $data->prix_examen,
                ];
            });
        return $data;
    }

    public function getAttributeExamen(int $id)
    {
        $data = Examen::select('*')->where('examen_laboratoire_id', $id)->get();


        return $data;
    }

    public function getResultatById(int $id)
    {
        $examens = Examen::with(['consultations', 'examenLaboratoire'])
            ->whereHas('consultations', function ($query) use ($id) {
                $query->where('consultations.id', $id);
            })
            ->get()
            ->map(function ($examen, $key) {
                // dd($examen->examenLaboratoire);
                return [
                    'id_examen' => $examen->id,
                    'designation_examens_labo' => $examen->examenLaboratoire->designation_examens_labo,
                    'valeurs_referrences' => $examen->examenLaboratoire->valeurs_referrences,
                    'Unite' => $examen->examenLaboratoire->Unite,
                    'examen_laboratoire_id' => $examen->examen_laboratoire_id,
                    'resultat_examens' => is_null($examen->resultat_examens) ? "" : $examen->resultat_examens,
                    'observation_examens' => is_null($examen->observation_examens) ? "" : $examen->observation_examens,
                    'finished' => is_null($examen->finished) ? "" : $examen->finished
                ];
            });

        // $examensIds = $examens->pluck('id'); // Obtient les IDs des examens récupérés


        return $examens;
    }

    public function getConclusionExamenById($id)
    {
        $examens = Examen::with(['consultations', 'examenLaboratoire'])
            ->whereHas('consultations', function ($query) use ($id) {
                $query->where('consultations.id', $id);
            })
            ->get();

        $examensIds = $examens->pluck('id'); // Obtient les IDs des examens récupérés
        $conclusion = ConclusionExamen::whereIn('examen_id', $examensIds)
                    ->get();
                    // ->map( function ($conclusion, $examens) {
                    //     // dd($examens);
                    // });

        // dd($conclusion);
        return $conclusion;
    }
}
