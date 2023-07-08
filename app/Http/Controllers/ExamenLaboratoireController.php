<?php

namespace App\Http\Controllers;

use App\Action\LaboratoireAction;
use App\Http\Requests\StoreExamenLaboratoireRequest;
use App\Http\Requests\UpdateExamenLaboratoireRequest;
use App\Models\ExamenLaboratoire;
use App\Repository\ExamenRepository;
use App\Repository\LaboratoireRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Monolog\Handler\PushoverHandler;

// use GuzzleHttp\Psr7\Request;

class ExamenLaboratoireController extends Controller
{

    protected $laboratoireRepository;
    private $examenRepository;

    public function __construct(

        LaboratoireRepository $laboratoireRepository,
        ExamenRepository $examenRepository
    ) {
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
        $examenAll = $this->examenRepository->getExamenLaboratoireAll();
        $getListeLaboratoire = $this->examenRepository->getListeExamenLaboratoire();
        // dd($getListeLaboratoire);
        $script = asset('script/laboratoireExamenAjax.js');
        // dd($script);
        return view('laboratoire.listeExamen', ['examen' => $examenAll, 'listeExamen' => $getListeLaboratoire, 'script' => $script]);
    }

    public function getElementLabo($id)
    {

        $data = $this->examenRepository->getExamen($id);
        // dd($ordonnance);
        
        return response()->json(['examenId' => $data]);
    }

    public function getDataExamen($id)
    {
        $data = $this->examenRepository->getDataExamen($id);

        return response()->json(['examenId' => $data]);
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
     * @param  \App\Http\Requests\StoreExamenLaboratoireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamenLaboratoireRequest $request)
    {
        //
    }


    public function storeResultat(Request $request, LaboratoireAction $action){
        try {
            //code...
            $examenResponse = $action->saveResultationExamen($request);

            // dd($examenResponse, 'ExamenLaboratoireController');exit;

            if (!is_null($examenResponse['data']))
            {
                // consulted/{id}/patient
                return redirect()->route('laboratoire.examen.liste', [ 'reponse'=>$examenResponse])->with('success', $examenResponse['message']);

            }else {
                // dd("eto");
                return redirect()->route('laboratoire.examen.liste', [ 'reponse'=>$examenResponse])->with('error', $examenResponse['message']);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamenLaboratoire  $examenLaboratoire
     * @return \Illuminate\Http\Response
     */
    public function show(ExamenLaboratoire $examenLaboratoire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamenLaboratoire  $examenLaboratoire
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamenLaboratoire $examenLaboratoire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamenLaboratoireRequest  $request
     * @param  \App\Models\ExamenLaboratoire  $examenLaboratoire
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamenLaboratoireRequest $request, ExamenLaboratoire $examenLaboratoire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamenLaboratoire  $examenLaboratoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamenLaboratoire $examenLaboratoire)
    {
        //
    }
}
