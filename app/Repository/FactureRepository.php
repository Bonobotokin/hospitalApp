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
            // ->where('isNotPayed', false)
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

   
}
