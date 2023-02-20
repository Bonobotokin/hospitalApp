<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceMedicaleRequest;
use App\Http\Requests\UpdateServiceMedicaleRequest;
use App\Models\ServiceMedicale;

class ServiceMedicaleController extends Controller
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
     * @param  \App\Http\Requests\StoreServiceMedicaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceMedicaleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceMedicale  $serviceMedicale
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceMedicale $serviceMedicale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceMedicale  $serviceMedicale
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceMedicale $serviceMedicale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceMedicaleRequest  $request
     * @param  \App\Models\ServiceMedicale  $serviceMedicale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceMedicaleRequest $request, ServiceMedicale $serviceMedicale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceMedicale  $serviceMedicale
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceMedicale $serviceMedicale)
    {
        //
    }
}
