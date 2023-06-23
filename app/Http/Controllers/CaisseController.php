<?php

namespace App\Http\Controllers;

use App\Action\FactureAction;
use App\Http\Requests\StoreCaisseRequest;
use App\Http\Requests\UpdateCaisseRequest;
use App\Models\Caisse;
use App\Repository\FactureRepository;
use GuzzleHttp\Psr7\Request;

class CaisseController extends Controller
{

    protected $factureRepository;

    public function __construct(
        FactureRepository $factureRepository
    )
    {
        $this->factureRepository = $factureRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facture = $this->factureRepository->getAll();
        // dd($facture);
        return view('caisses.payementPatient', 
            [
                'factures' => $facture
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($numfacture)
    {
        $data = $this->factureRepository->getFacture($numfacture);
        
        return view('caisses.enegistrementDepayemeny', 
                [
                    'facture' => $data
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCaisseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCaisseRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function show(Caisse $caisse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function edit(Caisse $caisse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCaisseRequest  $request
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request);exit;
        // try {
        //     //code...
        //     // $Response = $caisse->savePayement($request);

        //     dd($Response, 'caisses');

        //     if (!is_null($Response['data']))
        //     {

        //         return redirect()->route('all.patient.payeable',['reponse'=>$Response])->with('success', $Response['message']);

        //     }else {
        //         return redirect()->back()->withErrors($Response)->withInput();
        //     }
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caisse $caisse)
    {
        //
    }
}
