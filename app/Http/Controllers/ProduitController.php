<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Action\ProduitsAction;
use Illuminate\Support\Facades\Auth;
use App\Repository\ProduitsRepository;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    private $produitsRepository;

    public function __construct(
        ProduitsRepository $produitsRepository
    ){
        $this->produitsRepository = $produitsRepository;
    }


    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $produits = $this->produitsRepository->getAll();
        return view('Produits.index', 
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
     * Summary of store
     * @param StoreProduitRequest $request
     * @return \Exception|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreProduitRequest $request, ProduitsAction $action)
    {
        try {

            $reponse_fourniture = $action->handleProduits($request);
            // dd($reponse_fourniture);
            if (!is_null($reponse_fourniture['data']))
            {
                return redirect()->route('index.produits',['reponse' => $reponse_fourniture])->with('success', $reponse_fourniture['message']);

            }else {

                return redirect()->back()->withErrors($reponse_fourniture)->withInput();
            }
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduitRequest  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
