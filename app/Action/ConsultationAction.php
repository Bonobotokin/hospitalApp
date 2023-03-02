<?php

namespace App\Action;

use App\Models\Consultation;
use App\Models\DistributionPharmacie;
use App\Models\FactureDispensaire;
use App\Models\Posologie;
use App\Models\Prescription;
use App\Repository\PersonnelRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsultationAction
{

    private $personnelRepository;
    public function __construct(

        PersonnelRepository $personnelRepository
    ) {
        $this->personnelRepository = $personnelRepository;
    }



    public function newPatientConsulted($request)
    {

        try {

            $data = DB::transaction(function () use ($request) {

                $magasinierId = Auth::user()->id;
            
                $equipeFourniture = $this->personnelRepository->getPersonnelConnected($magasinierId);
            
                $nombreMedicaments = (int) $request->input('nombreMedicament');
            
                $consultation = Consultation::find($request->consultation_id);
            
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
