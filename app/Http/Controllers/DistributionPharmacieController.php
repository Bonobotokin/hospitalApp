<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDistributionPharmacieRequest;
use App\Http\Requests\UpdateDistributionPharmacieRequest;
use App\Models\DistributionPharmacie;

class DistributionPharmacieController extends Controller
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
     * @param  \App\Http\Requests\StoreDistributionPharmacieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistributionPharmacieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DistributionPharmacie  $distributionPharmacie
     * @return \Illuminate\Http\Response
     */
    public function show(DistributionPharmacie $distributionPharmacie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DistributionPharmacie  $distributionPharmacie
     * @return \Illuminate\Http\Response
     */
    public function edit(DistributionPharmacie $distributionPharmacie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDistributionPharmacieRequest  $request
     * @param  \App\Models\DistributionPharmacie  $distributionPharmacie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDistributionPharmacieRequest $request, DistributionPharmacie $distributionPharmacie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DistributionPharmacie  $distributionPharmacie
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistributionPharmacie $distributionPharmacie)
    {
        //
    }
}
