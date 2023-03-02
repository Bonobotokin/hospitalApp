<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultationPrescriptionRequest;
use App\Http\Requests\UpdateConsultationPrescriptionRequest;
use App\Models\ConsultationPrescription;

class ConsultationPrescriptionController extends Controller
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
     * @param  \App\Http\Requests\StoreConsultationPrescriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsultationPrescriptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsultationPrescription  $consultationPrescription
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultationPrescription $consultationPrescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsultationPrescription  $consultationPrescription
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsultationPrescription $consultationPrescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsultationPrescriptionRequest  $request
     * @param  \App\Models\ConsultationPrescription  $consultationPrescription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultationPrescriptionRequest $request, ConsultationPrescription $consultationPrescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsultationPrescription  $consultationPrescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsultationPrescription $consultationPrescription)
    {
        //
    }
}
