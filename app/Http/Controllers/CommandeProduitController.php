<?php

namespace App\Http\Controllers;

use App\Action\CommandeAction;
use App\Http\Requests\UpdateCommandeProduitRequest;
use App\Models\CommandeProduit;
use App\Repository\CommandeRepository;
use App\Repository\DepotsRepository;
use App\Repository\StockPharmacieRepository;
use Illuminate\Http\Request;

class CommandeProduitController extends Controller
{

    private $stockPharmacieRepository;
    private $commandeRepository;
    private $depotsRepository;

    public function __construct(
        StockPharmacieRepository $stockPharmacieRepository,
        CommandeRepository $commandeRepository,
        DepotsRepository $depotsRepository
    )
    {
        $this->stockPharmacieRepository = $stockPharmacieRepository;
        $this->commandeRepository = $commandeRepository;
        $this->depotsRepository = $depotsRepository;
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
        $getAllCommande = $this->commandeRepository->getAll();
        // dd($getAllCommande);
        return view('Commandes.AllCommande',
            [
                'pharmacieCommande' => $stockPharmacieSeuil,
                'commande' => $getAllCommande
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
        // $depotsMagasin = $this->depotsRepository->getProduitMesdicament();
        $generedNumber = $this->commandeRepository->getGeneredNumCommande();
        // dd(count($stockPharmacieSeuil));
        return view('Commandes.CreateCommande',
            [
                // 'depots' => $depotsMagasin,
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
            $commandeResponse = $action->newCommandeNotCommande($request);

            // dd($commandeResponse, 'eto2');
            if (!is_null($commandeResponse['data']))
            {
                
                return redirect()->route('commande.index',['reponse'=>$commandeResponse])->with('success', $commandeResponse['message']);

            }else {
                
                return redirect()->back()->withErrors($commandeResponse)->withInput();
            }
        } catch (\Throwable $th) {

            return $th;

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
    public function update(Request $request, CommandeProduit $commandeProduit)
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
