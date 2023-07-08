<?php

namespace App\Action;

use App\Models\Consultation;
use App\Models\consultationExamenPrescription;
use App\Models\DistributionPharmacie;
use App\Models\Examen;
use App\Models\FactureDispensaire;
use App\Models\Posologie;
use App\Models\Prescription;
use App\Repository\LaboratoireRepository;
use App\Repository\PersonnelRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsultationAction
{

    private $personnelRepository;
    private $laboratoireRepository;
    public function __construct(

        PersonnelRepository $personnelRepository,
        LaboratoireRepository $laboratoireRepository
    ) {
        $this->personnelRepository = $personnelRepository;
        $this->laboratoireRepository = $laboratoireRepository;
    }



    public function newPatientConsulted($request)
    {
        // dd($request);
        try {

            $data = DB::transaction(function () use ($request) {

                // $magasinierId = Auth::user()->id;

                // $equipeFourniture = $this->personnelRepository->getMagasinnier($magasinierId);

                if ($request->nombreLaboratoire > 0) {

                    $saveExamenLaboratoire = $this->examenLaboratoire($request);
                    return [
                        "data" => true,
                        "patient_id" => (int) $request->patient_id,
                        "message" => "L'enregistrement de l'examen de $request->patient_nom a été bien enregistré"
                    ];
                } else {
                    $consultationComplet = $this->consultation($request);
                    return [
                        "data" => true,
                        "message" => "L'enregistrement de la consultation de $request->patient_nom a été bien enregistré"
                    ];
                }
                // dd($consultation);exit;


                // return [
                //     "data" => $consultation->id,
                //     "message" => "L'enregistrement de cette consultation a été bien enregistré"
                // ];
            });


            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function examenLaboratoire($data)
    {
        $nombreLabo = (int) $data->nombreLaboratoire;

        $laboratoireListe = [];

        for ($l = 0; $l < $nombreLabo; $l++) {
            $elementLabo = $data->$l;
            $getDataLabo = $this->laboratoireRepository->getElement($elementLabo);

            $laboratoireListe[] = $getDataLabo->id;
        }

        $consultation = Consultation::find($data->consultation_id);
        $consultation->consulted = false;
        $consultation->symptome = $data->symptomes;
        $consultation->diagnostique = $data->diagnostic;
        $consultation->save();
        $consultationId = $consultation->id;

        $facture = FactureDispensaire::create([
            // 'num_facture_patient' => (int) $request->numFacture,
            // 'prix_total' => 
            'consultation_id' => $consultationId
        ]);
        $examens = []; // Initialize the $examens variable as an array

        foreach ($laboratoireListe as $key => $value) {
            $examen = Examen::create([
                'examen_laboratoire_id' => $value
            ]);

            $examens[] = $examen; // Add the Examen instance to the $examens array

            $sync = consultationExamenPrescription::updateOrCreate([
                'consultation_id' => $consultation->id,
                'examen_id' => $examen->id
            ]);
        }

        // dd($sync);
        return !is_null($sync);
    }

    function consultation($request)
    {

        $nombreMedicaments = (int) $request->input('nombreMedicament');
        $consultation = Consultation::find($request->consultation_id);
        $consultation->consulted = true;
        $consultation->symptome = $request->symptomes;
        $consultation->diagnostique = $request->diagnostic;
        $consultation->save();

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
            'facture_dispensaire_id' => $facture->id,
            'pharmacien_id' => null,
            'isDistribued' => false
        ]);

        // On synchronise la relation many-to-many entre consultations et prescriptions
        $sync = $consultation->prescription()->sync($prescriptionIds);

        return !is_null($sync);
    }
}
