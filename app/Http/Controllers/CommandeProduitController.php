<?php

namespace App\Http\Controllers;

use App\Action\CommandeAction;
use App\Http\Requests\UpdateCommandeProduitRequest;
use App\Models\CommandeProduit;
use App\Repository\CommandeRepository;
use App\Repository\StockPharmacieRepository;
use Illuminate\Http\Request;

class CommandeProduitController extends Controller
{

    private $stockPharmacieRepository;
    private $commandeRepository;

    public function __construct(
        StockPharmacieRepository $stockPharmacieRepository,
        CommandeRepository $commandeRepository
    )
    {
        $this->stockPharmacieRepository = $stockPharmacieRepository;
        $this->commandeRepository = $commandeRepository;
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
        // dd($stockPharmacieSeuil);
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
        $stockPharmacieSeuil = $this->stockPharmacieRepository->lookOfQuantite();
        $generedNumber = $this->commandeRepository->getGeneredNumCommande();
        // dd($generedNumber->isEmpty());
        return view('Commandes.CreateCommande',
            [
                'produits' => $stockPharmacieSeuil,
                'generedNumber' => $generedNumber
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommandeProduitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CommandeAction $action)
    {
        try {
            //code...
            $achatResponse = $action->commandeAction($request);

            dd($achatResponse, 'eto1');

            if (!is_null($achatResponse['data']))
            {

                return redirect()->route('produits.achat',['reponse'=>$achatResponse])->with('success', $achatResponse['message']);

            }else {
                return redirect()->back()->withErrors($achatResponse)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
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
