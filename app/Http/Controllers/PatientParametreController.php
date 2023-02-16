<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientParametreRequest;
use App\Http\Requests\UpdatePatientParametreRequest;
use App\Models\PatientParametre;

class PatientParametreController extends Controller
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
     * @param  \App\Http\Requests\StorePatientParametreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientParametreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientParametre  $patientParametre
     * @return \Illuminate\Http\Response
     */
    public function show(PatientParametre $patientParametre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientParametre  $patientParametre
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientParametre $patientParametre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientParametreRequest  $request
     * @param  \App\Models\PatientParametre  $patientParametre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientParametreRequest $request, PatientParametre $patientParametre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientParametre  $patientParametre
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientParametre $patientParametre)
    {
        //
    }
}
