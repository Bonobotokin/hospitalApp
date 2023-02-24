<?php

namespace App\Http\Controllers;

use App\Models\Magasinier;
use Illuminate\Http\Request;
use App\Action\AchatProduitsAction;
use App\Repository\DepotsRepository;
use App\Repository\AchatProduitsRepository;
use App\Http\Requests\StoreMagasinierRequest;
use App\Http\Requests\UpdateMagasinierRequest;

class MagasinierController extends Controller
{
    private $depotsRepository;
    private $achatProduitsRepository;
    public function __construct(

        DepotsRepository $depotsRepository,
        AchatProduitsRepository $achatProduitsRepository

    ){
        $this->depotsRepository = $depotsRepository;
        $this->achatProduitsRepository = $achatProduitsRepository;
    }
    

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $listeAchat = $this->achatProduitsRepository->getAllByNum();

        return view('magasin.achatProduits',
            [
                'liste' => $listeAchat
            ]
        );
    }

    /**
     * Summary of create Achats Produits
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $produits = $this->depotsRepository->getAll();
        $numAchat = $this->achatProduitsRepository->getNumAchatGenered();

        
        return view('magasin.nouveauxAchat',
            [
                'produits' => $produits,
                'numAchat' => $numAchat
            ]
        );
    }

    /**
     * Summary of store
    * @param Request $request
    * @param AchatProduitsAction $achat
    * @return \Illuminate\Http\RedirectResponse
    */
    
    public function store(Request $request, AchatProduitsAction $achat)
    {
        try {
            //code...
            $achatResponse = $achat->newAchatProduits($request);

            // dd($achatResponse, 'eto1');

            if (!is_null($achatResponse['data']))
            {

                return redirect()->route('index.achat.produits',['reponse'=>$achatResponse])->with('success', $achatResponse['message']);

            }else {
                return redirect()->back()->withErrors($achatResponse)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Summary of show
     * @param int $num
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $num)
    {
        //
        $showListeAchat = $this->achatProduitsRepository->getByNumAchat($num);
        $isRessut = $this->achatProduitsRepository->setRessut($num);
      
        return view('magasin.detailsAchat',
            [
                'achat' => $showListeAchat,
                'isRessut' => $isRessut
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magasinier  $magasinier
     * @return \Illuminate\Http\Response
     */
    public function edit(Magasinier $magasinier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMagasinierRequest  $request
     * @param  \App\Models\Magasinier  $magasinier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magasinier $magasinier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magasinier  $magasinier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magasinier $magasinier)
    {
        //
    }
}
