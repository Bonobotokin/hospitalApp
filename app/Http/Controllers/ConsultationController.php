<?php

namespace App\Http\Controllers;

use App\Action\ConsultationAction;
use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Models\Consultation;
use App\Repository\ConsultationRepository;
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

    public function __construct(

        ConsultationRepository $consultationRepository,
        TypesConsultationRepository $typesConsultationRepository,
        PersonnelRepository $personnelRepository,
        PatientRepository $patientRepository,
        StockPharmacieRepository $stockPharmacieRepository

    )
    {
        
        $this->consultationRepository = $consultationRepository;
        $this->typesConsultationRepository = $typesConsultationRepository;
        $this->personnelRepository  = $personnelRepository;
        $this->patientRepository = $patientRepository;
        $this->stockPharmacieRepository = $stockPharmacieRepository;

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
        return view('Medecins.listeConsultation', 
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
        try {
            //code...
            $consultationResponse = $action->newPatientConsulted($request);

            dd($consultationResponse, 'eto1');

            if (!is_null($consultationResponse['data']))
            {

                return redirect()->route('index.achat.produits',['reponse'=>$consultationResponse])->with('success', $consultationResponse['message']);

            }else {
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
        
        return view('Medecins.patientConsulter', 
            [
                'patient' => $patientInfo[0],
                'produitListe' => $produits,
                'parametre' => $parametre[0]
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
