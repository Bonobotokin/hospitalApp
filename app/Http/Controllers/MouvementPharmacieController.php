<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremouvementPharmacieRequest;
use App\Http\Requests\UpdatemouvementPharmacieRequest;
use App\Models\mouvementPharmacie;

class MouvementPharmacieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoremouvementPharmacieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremouvementPharmacieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mouvementPharmacie  $mouvementPharmacie
     * @return \Illuminate\Http\Response
     */
    public function show(mouvementPharmacie $mouvementPharmacie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mouvementPharmacie  $mouvementPharmacie
     * @return \Illuminate\Http\Response
     */
    public function edit(mouvementPharmacie $mouvementPharmacie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemouvementPharmacieRequest  $request
     * @param  \App\Models\mouvementPharmacie  $mouvementPharmacie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemouvementPharmacieRequest $request, mouvementPharmacie $mouvementPharmacie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mouvementPharmacie  $mouvementPharmacie
     * @return \Illuminate\Http\Response
     */
    public function destroy(mouvementPharmacie $mouvementPharmacie)
    {
        //
    }
}
