<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePharmacienRequest;
use App\Http\Requests\UpdatePharmacienRequest;
use App\Models\Pharmacien;
use App\Repository\StockPharmacieRepository;
use GuzzleHttp\Psr7\Request;

class PharmacienController extends Controller
{
    protected $stockPharmacieRepository;

    public function __construct(
        StockPharmacieRepository $stockPharmacieRepository
    )
    {
       $this->stockPharmacieRepository = $stockPharmacieRepository; 
    }

    public function index()
    {
        // dd('ok');
        return view('Pharmacie.CommandeProduits');
    }

    public function listeDistibution()
    {
        $distributionFill = $this->stockPharmacieRepository->distribution();
        // dd($distributionFill);
        return view('Pharmacie.distibution', 
            [
                'liste' => $distributionFill
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllNewProduits()
    {
        return view('Pharmacie.metreAjourStock');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePharmacienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacien  $pharmacien
     * @return \Illuminate\Http\Response
     */
    public function detailsDistribution(int $data)
    {
        $dataShow = $this->stockPharmacieRepository->getPrescriptionById($data);
        // dd($dataShow[0]);
        return view('Pharmacie.patientDistribution', 
    
            [
                'liste' => $dataShow[0]
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacien  $pharmacien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacien $pharmacien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePharmacienRequest  $request
     * @param  \App\Models\Pharmacien  $pharmacien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmacien $pharmacien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacien  $pharmacien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacien $pharmacien)
    {
        //
    }
}
