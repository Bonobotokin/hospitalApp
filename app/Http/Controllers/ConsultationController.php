<?php

namespace App\Http\Controllers;

use App\Action\ConsultationAction;
use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Models\Consultation;
use App\Repository\ConsultationRepository;
use App\Repository\ExamenRepository;
use App\Repository\LaboratoireRepository;
use App\Repository\PatientRepository;
use App\Repository\PersonnelRepository;
use App\Repository\StockPharmacieRepository;
use App\Repository\TypesConsultationRepository;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    protected $typesConsultationRepository;
    protected $personnelRepository;
    protected $consultationRepository;
    protected $patientRepository;
    private $stockPharmacieRepository;
    private $laboratoireRepository;
    private $examenRepository;

    public function __construct(

        ConsultationRepository $consultationRepository,
        TypesConsultationRepository $typesConsultationRepository,
        PersonnelRepository $personnelRepository,
        PatientRepository $patientRepository,
        StockPharmacieRepository $stockPharmacieRepository,
        LaboratoireRepository $laboratoireRepository,
        ExamenRepository $examenRepository

    ) {

        $this->consultationRepository = $consultationRepository;
        $this->typesConsultationRepository = $typesConsultationRepository;
        $this->personnelRepository  = $personnelRepository;
        $this->patientRepository = $patientRepository;
        $this->stockPharmacieRepository = $stockPharmacieRepository;
        $this->laboratoireRepository = $laboratoireRepository;
        $this->examenRepository = $examenRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listeConsultation = $this->consultationRepository->get_patient_consultation_to_day();
        $dateConsultation = $this->consultationRepository->date_consultation();

        return view(
            'Medecins.listeConsultation',
            [
                'listeConsultation' => $listeConsultation,
                'dateConsultation' => $dateConsultation
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConsultationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ConsultationAction $action)
    {
        // dd($request);exit;
        try {
            //code...
            $consultationResponse = $action->newPatientConsulted($request);

            dd($consultationResponse, 'consultationController');
            exit;

            if (!is_null($consultationResponse['data']) && !is_null($consultationResponse['patient_id'])) {
                // consulted/{id}/patient
                return redirect()->route('consulte.patient', ['id' => $consultationResponse['patient_id'], 'reponse' => $consultationResponse])->with('success', $consultationResponse['message']);
            } else {
                return redirect()->back()->withErrors($consultationResponse)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function consultePatient(int $id)
    {
        // dd($id);
        $patientInfo = $this->consultationRepository->getPatientById($id);
        $produits = $this->stockPharmacieRepository->getAll();
        $parametre = $this->patientRepository->getParametrepatient($id);
        $laboratoire = $this->laboratoireRepository->getAll();
        $examen = $this->examenRepository->getExamenConsultation($id);
        $resultatExamen = $this->examenRepository->getResultatById($id);  
        $getRapport = $this->examenRepository->getConclusionExamenById($id);
        // dd($resultatExamen);
        return view(
            'Medecins.patientConsulter',
            [
                'patient' => $patientInfo[0],
                'produitListe' => $produits,
                'parametre' => $parametre[0],
                'laboratoire' => $laboratoire,
                'examen' => $examen,
                'resultatLabo' => $resultatExamen,
                'rapport' => $getRapport
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsultationRequest  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        //
    }
}
