<?php

namespace App\Http\Controllers;

use App\Action\FactureAction;
use App\Action\factureDispensaireAction;
use App\Http\Requests\StoreFactureDispensaireRequest;
use App\Http\Requests\UpdateFactureDispensaireRequest;
use App\Models\FactureDispensaire;
use Illuminate\Http\Request;

class FactureDispensaireController extends Controller
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
     * @param  \App\Http\Requests\StoreFactureDispensaireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FactureAction $action)
    {
        try {
            //code...
            $Response = $action->savePayement($request);

            // dd($Response, 'consultationController');

            if (!is_null($Response['data']))
            {

                return redirect()->route('all.patient.payeable',['reponse'=>$Response])->with('success', $Response['message']);

            }else {
                return redirect()->back()->withErrors($Response)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FactureDispensaire  $factureDispensaire
     * @return \Illuminate\Http\Response
     */
    public function show(FactureDispensaire $factureDispensaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactureDispensaire  $factureDispensaire
     * @return \Illuminate\Http\Response
     */
    public function edit(FactureDispensaire $factureDispensaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFactureDispensaireRequest  $request
     * @param  \App\Models\FactureDispensaire  $factureDispensaire
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFactureDispensaireRequest $request, FactureDispensaire $factureDispensaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactureDispensaire  $factureDispensaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactureDispensaire $factureDispensaire)
    {
        //
    }
}
