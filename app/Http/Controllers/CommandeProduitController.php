<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateCommandeProduitRequest;
use App\Models\CommandeProduit;
use App\Repository\StockPharmacieRepository;
use Illuminate\Http\Request;

class CommandeProduitController extends Controller
{

    private $stockPharmacieRepository;

    public function __construct(
        StockPharmacieRepository $stockPharmacieRepository
    )
    {
        $this->stockPharmacieRepository = $stockPharmacieRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Envoyer Instatanner les Medicament qui a besoin d'etre Approvisonner
        $stockPharmacieSeuil = $this->stockPharmacieRepository->lookOfQuantite();
       
        return view('Commandes.AllCommande',
            [
                'pharmacieCommande' => $stockPharmacieSeuil
            ]
        );
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
    public function store(Request $request)
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
