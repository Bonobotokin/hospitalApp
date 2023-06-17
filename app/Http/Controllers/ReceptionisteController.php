<?php

namespace App\Http\Controllers;

use App\Action\PatientAction;
use App\Http\Requests\StoreConsultationPatient;
use App\Http\Requests\StoreReceptionisteRequest;
use App\Http\Requests\UpdateReceptionisteRequest;
use App\Models\Consultation;
use App\Models\Receptioniste;
use App\Repository\ConsultationRepository;
use App\Repository\PatientRepository;
use App\Repository\PersonnelRepository;
use App\Repository\TypesConsultationRepository;
use Illuminate\Http\Request;

class ReceptionisteController extends Controller
{

    protected $typesConsultationRepository;
    protected $personnelRepository;
    protected $consultationRepository;
    protected $patientRepository;

    public function __construct(

        ConsultationRepository $consultationRepository,
        TypesConsultationRepository $typesConsultationRepository,
        PersonnelRepository $personnelRepository,
        PatientRepository $patientRepository

    )
    {
        
        $this->consultationRepository = $consultationRepository;
        $this->typesConsultationRepository = $typesConsultationRepository;
        $this->personnelRepository  = $personnelRepository;
        $this->patientRepository = $patientRepository;

    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function patient()
    {
        $patient = $this->patientRepository->get_all_not_hospitaled();
        return view('Reception.index', 
            [
                'listePatient' => $patient
            ]
        );
    }

    public function consultation()
    {
        $listeConsultation = $this->consultationRepository->get_patient_consultation_to_day();
        $dateConsultation = $this->consultationRepository->date_consultation();
        return view('Reception.listeConsultation', 
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
    public function createConsultation()
    {

        $typeConsultation = $this->typesConsultationRepository->getAll();
        $medecin = $this->personnelRepository->getMedecin();

        return view('Reception.NouveauxConsultation', 
            [
                'types' => $typeConsultation,
                'medecins' => $medecin
            ]
        );
    }

    
    public function storeConsultation(Request $request, PatientAction $action)
    {
        try {

            $response_action = $action->add_hadle_patient($request);
            // dd($response_action, 'receptionisteController');
            if (!is_null($response_action['data'])) {
                // dd($response_action, 'receptionisteController');exit;
                return redirect()->route('liste.consultation',['reponse'=>$response_action])->with('success', $response_action['message']);

            }else {
                // dd($response_action, 'receptionisteController');exit;
                return redirect()->back()->withErrors($response_action)->withInput();
            }
        } catch (\exception $th) {
            return $th;
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receptioniste  $receptioniste
     * @return \Illuminate\Http\Response
     */
    public function show(Receptioniste $receptioniste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receptioniste  $receptioniste
     * @return \Illuminate\Http\Response
     */
    public function edit(Receptioniste $receptioniste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReceptionisteRequest  $request
     * @param  \App\Models\Receptioniste  $receptioniste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receptioniste $receptioniste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receptioniste  $receptioniste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receptioniste $receptioniste)
    {
        //
    }
}
