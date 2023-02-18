<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReceptionisteRequest;
use App\Http\Requests\UpdateReceptionisteRequest;
use App\Models\Receptioniste;
use Illuminate\Http\Request;

class ReceptionisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function patient()
    {
        return view('Reception.index');
    }

    public function consultation()
    {
        return view('Reception.listeConsultation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createConsultation()
    {
        return view('Reception.NouveauxConsultation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReceptionisteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
