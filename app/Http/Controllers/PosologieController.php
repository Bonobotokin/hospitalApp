<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePosologieRequest;
use App\Http\Requests\UpdatePosologieRequest;
use App\Models\Posologie;

class PosologieController extends Controller
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
     * @param  \App\Http\Requests\StorePosologieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePosologieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posologie  $posologie
     * @return \Illuminate\Http\Response
     */
    public function show(Posologie $posologie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posologie  $posologie
     * @return \Illuminate\Http\Response
     */
    public function edit(Posologie $posologie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePosologieRequest  $request
     * @param  \App\Models\Posologie  $posologie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePosologieRequest $request, Posologie $posologie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posologie  $posologie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posologie $posologie)
    {
        //
    }
}
