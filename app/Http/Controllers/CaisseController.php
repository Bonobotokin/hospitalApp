<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaisseRequest;
use App\Http\Requests\UpdateCaisseRequest;
use App\Models\Caisse;
use App\Repository\CaisseRepository;
use App\Repository\FactureRepository;

class CaisseController extends Controller
{

    protected $factureRepository, $caisseRepository;

    public function __construct(
        FactureRepository $factureRepository,
        CaisseRepository $caisseRepository, 
    )
    {
        $this->factureRepository = $factureRepository;
        $this->caisseRepository = $caisseRepository;
    }

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

    public function encaisseMentJournaliere()
    {
        $jour_encaissement = $this->caisseRepository->getEncaissementJournaliere();
        // dd(sum($jour_encaissement['montant']));
        return view('caisses.encaissementJournaliere', 
            [
                'encaissement' => $jour_encaissement
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
     * @param  \App\Http\Requests\StoreCaisseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCaisseRequest $request)
    {
        //
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
    public function update(UpdateCaisseRequest $request, Caisse $caisse)
    {
        //
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
