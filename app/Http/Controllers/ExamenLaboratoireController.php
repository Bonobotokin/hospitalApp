<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExamenLaboratoireRequest;
use App\Http\Requests\UpdateExamenLaboratoireRequest;
use App\Models\ExamenLaboratoire;

class ExamenLaboratoireController extends Controller
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
     * @param  \App\Http\Requests\StoreExamenLaboratoireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamenLaboratoireRequest $request)
    {
        //
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
