<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommandeProduitRequest;
use App\Http\Requests\UpdateCommandeProduitRequest;
use App\Models\CommandeProduit;

class CommandeProduitController extends Controller
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
     * @param  \App\Http\Requests\StoreCommandeProduitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommandeProduitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommandeProduit  $commandeProduit
     * @return \Illuminate\Http\Response
     */
    public function show(CommandeProduit $commandeProduit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommandeProduit  $commandeProduit
     * @return \Illuminate\Http\Response
     */
    public function edit(CommandeProduit $commandeProduit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommandeProduitRequest  $request
     * @param  \App\Models\CommandeProduit  $commandeProduit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandeProduitRequest $request, CommandeProduit $commandeProduit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommandeProduit  $commandeProduit
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommandeProduit $commandeProduit)
    {
        //
    }
}
