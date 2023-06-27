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
                    'patient' => $patient->nom_patient . " " . $patient->prenom_patient,
                    'etat' => $data->isDistribued
                ];
            });

        return $data;
        // return $facturesInfo;
    }

    public function getPrescription(int $id)
    {
        $data = DistributionPharmacie::with('consultation')->whereHas('consultation', function ($query) use ($id) {
            $query->where('id', $id);
        })->get()->map(function ($data) {
            // dd($data->consultation->patient);
            return $data; // Ajoutez cette ligne pour retourner les données
        });

        return $data;
    }
}
