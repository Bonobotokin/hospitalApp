<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMouvementDepotRequest;
use App\Http\Requests\UpdateMouvementDepotRequest;
use App\Models\MouvementDepot;

class MouvementDepotController extends Controller
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
     * @param  \App\Http\Requests\StoreMouvementDepotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMouvementDepotRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MouvementDepot  $mouvementDepot
     * @return \Illuminate\Http\Response
     */
    public function show(MouvementDepot $mouvementDepot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MouvementDepot  $mouvementDepot
     * @return \Illuminate\Http\Response
     */
    public function edit(MouvementDepot $mouvementDepot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMouvementDepotRequest  $request
     * @param  \App\Models\MouvementDepot  $mouvementDepot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMouvementDepotRequest $request, MouvementDepot $mouvementDepot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MouvementDepot  $mouvementDepot
     * @return \Illuminate\Http\Response
     */
    public function destroy(MouvementDepot $mouvementDepot)
    {
        //
    }
}
