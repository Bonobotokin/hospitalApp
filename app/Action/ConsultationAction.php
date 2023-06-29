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
                
                $equipeFourniture = $this->personnelRepository->getMagasinnier($magasinierId);
            
                $nombreMedicaments = (int) $request->input('nombreMedicament');
            
                $consultation = Consultation::find($request->consultation_id);
                $consultation->consulted = true;
                $consultation->symptome = $request->symptomes;
                $consultation->diagnostique = $request->diagnostic;
                $consultation->save();

                // dd($consultation);exit;
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
            
            
                   

                    
                }

                $posologie = Posologie::create([
                    'details_posologie' => $request->posologie,
                    'consultation_id' => $consultation->id
                ]);
        
                $facture = FactureDispensaire::create([
                    // 'num_facture_patient' => (int) $request->numFacture,
                    // 'prix_total' => 
                    'consultation_id' => $consultation->id
                ]);
                $distribution = DistributionPharmacie::create([
                    'consultation_id' => $consultation->id,
                    'facture_dispensaire_id'=> $facture->id,
                    'pharmacien_id' => null,
                    'isDistribued' => false
                ]);
            
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
