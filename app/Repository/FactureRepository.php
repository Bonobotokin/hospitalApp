<?php

namespace App\Repository;

use App\Interfaces\FactureRepositoryInterface;
use App\Models\Consultation;
use App\Models\FactureDispensaire;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class FactureRepository implements FactureRepositoryInterface
{
    public function getAll()
    {
        $factures = FactureDispensaire::with([
            'consultation' => function ($query) {
                $query->with('patient', 'prescriptions.produit');
            },
            'consultation.prescriptions' => function ($query) {
                $query->with('produit', 'medecin')
                    ->select(['id', 'quantite', 'medecin_id', 'prix_unitaire', 'prix_total']);
            }
        ])
            ->where('isNotPayed', false)
            ->get();
        $facturesInfo = $factures->map(function ($facture) {
            $consultation = $facture->consultation;
            $patient = $consultation->patient;
            $prescriptions = $consultation->prescriptions;

            $produits = $prescriptions->map(function ($prescription) {
                // return $prescription->produit->designation_produits;
                return $prod = [
                    'produit_nom' => $prescription->produit->designation_produits,
                    'quantite' => $prescription->quantite,
                    'categorie' => $prescription->produit->categorie,
                    'prix_unitaire' => $prescription->produit->prix_vente_produits,
                    'prix_totale' => $prescription->prix_total,
                ];
            });

            return [
                'id' => $facture->id,
                'facture' => $facture->num_facture_patient,
                'patient' => $patient->nom_patient . ' ' . $patient->prenom,
                'matricule' => $patient->matricule,
                'montant' => $prescriptions->sum('prix_total') + $consultation->prix,
                'consultation_prix' => $consultation->prix,
                'produits' => $produits
            ];
        });

        // dd($facturesInfo);



        return $facturesInfo;
    }

    // $consultations = Consultation::with(['patient', 'prescription.produit'])
    //         ->whereHas('patient', function ($query) {
    //             $query->whereNotNull('id');
    //         })
    //         ->get()
    //         ->map(function ($consultation) {
    //             $patient = $consultation->patient;
    //             $produits = $consultation->prescription->pluck('produit_id');
    //             $medicaments = Produit::whereIn('id', $produits)
    //                 // ->select(['designation_produits', 'categorie'])
    //                 ->get()
    //                 ->map(function($medicaments){
    //                     return [
    //                         'nomProduit' => $medicaments->designation_produits,
    //                         'categorie' => $medicaments->categorie,
    //                     ];
    //                 });                
    //             return [
    //                 'id' => $patient->id,
    //                 'matricule' => $patient->matricule,
    //                 'nom' => $patient->nom_patient,
    //                 'prenom' => $patient->prenom_patient,
    //                 'sexe' => $patient->sexe_patient,
    //                 'age' => $patient->Age_patient,
    //                 'IsHospitaled' => !is_null($patient->IsHospitaled) ? null : 'Hospiliser',
    //                 'medicaments' => $medicaments,
    //             ];
    //         });



    //     dd($consultations);
    //     return $consultations;
}
