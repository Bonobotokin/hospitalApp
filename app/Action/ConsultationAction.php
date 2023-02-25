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


                $consultedUpdate = Consultation::select('id')->where('id', $request['consultation_id'])->get();

                foreach ($consultedUpdate as $dataConsultation) {

                    $dataConsultation->patient_id = $request->patient_id;
                    $dataConsultation->type_consultation_id = $request->type_consultation_id;
                    $dataConsultation->medecin_id = $request->medecin_id;
                    $dataConsultation->consulted = true;
                    $dataConsultation->diagnostique = $request->diagnostic;
                    $dataConsultation->symptome = $request->symptomes;

                    $dataConsultation->save();

                    $idConsulation = $dataConsultation->id;
                }

                $consultationId = $idConsulation;

                $posologie = Posologie::create([
                    'details_posologie' => $request->posologie,
                    'consultation_id' => $consultationId
                ]);

                $magasinierId = Auth::user()->id;

                $equipeFourniture = $this->personnelRepository->getPersonnelConnected($magasinierId);

                $nombreMedicaments = (int) $request->input('nombreMedicament');

                for ($i = 0; $i < $nombreMedicaments; $i++) {

                    $medeque = $request->$i;


                    $prescription = Prescription::create([
                        'produit_id' => $medeque['produits_id'],
                        'quantite' => (int) $medeque['quantite'],
                        'medecin_id' => (int) $request->medecin_id,
                        'consultation_id' => $consultationId,
                        'prix_unitaire' => (int) $medeque['prix'],
                        'prix_total' => (int) $medeque['prix'] *  (int) $medeque['quantite']
                    ]);
                    $prescriptionId = $prescription->id;

                    $distribution = DistributionPharmacie::create([
                        'prescription_id' => $prescriptionId,
                        'pharmacien_id' => null,
                        'distribuer' => 0,
                        'reste' => 0
                    ]);

                    $idDistribution = $distribution->id;
                    dd($request);

                    $facture = FactureDispensaire::create([
                        'num_facture_patient',
                        'prescription_id',
                    ]);
                }
            });

            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
