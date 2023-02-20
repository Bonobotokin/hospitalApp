<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonnelRoleRequest;
use App\Http\Requests\UpdatePersonnelRoleRequest;
use App\Models\PersonnelRole;

class PersonnelRoleController extends Controller
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
     * @param  \App\Http\Requests\StorePersonnelRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonnelRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonnelRole  $personnelRole
     * @return \Illuminate\Http\Response
     */
    public function show(PersonnelRole $personnelRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonnelRole  $personnelRole
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonnelRole $personnelRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonnelRoleRequest  $request
     * @param  \App\Models\PersonnelRole  $personnelRole
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonnelRoleRequest $request, PersonnelRole $personnelRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonnelRole  $personnelRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonnelRole $personnelRole)
    {
        //
    }
}
