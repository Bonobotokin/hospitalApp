<?php

namespace App\Http\Controllers;

use App\Models\StockPharmacie;
use App\Repository\ProduitsRepository;
use App\Http\Requests\StoreStockPharmacieRequest;
use App\Http\Requests\UpdateStockPharmacieRequest;
use App\Repository\StockPharmacieRepository;

class StockPharmacieController extends Controller
{

    private $produitsRepository;
    private $stockPharmacieRepository;

    public function __construct(

        ProduitsRepository $produitsRepository,
        StockPharmacieRepository $stockPharmacieRepository
        
    ){
        $this->produitsRepository = $produitsRepository;
        $this->stockPharmacieRepository = $stockPharmacieRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = $this->stockPharmacieRepository->getAll();

        
        return view('Pharmacie.stockMedicament', 
            [
                'produitListe' => $produits
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
     * @param  \App\Http\Requests\StoreStockPharmacieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockPharmacieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockPharmacie  $stockPharmacie
     * @return \Illuminate\Http\Response
     */
    public function show(StockPharmacie $stockPharmacie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockPharmacie  $stockPharmacie
     * @return \Illuminate\Http\Response
     */
    public function edit(StockPharmacie $stockPharmacie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockPharmacieRequest  $request
     * @param  \App\Models\StockPharmacie  $stockPharmacie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockPharmacieRequest $request, StockPharmacie $stockPharmacie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockPharmacie  $stockPharmacie
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockPharmacie $stockPharmacie)
    {
        //
    }
}
