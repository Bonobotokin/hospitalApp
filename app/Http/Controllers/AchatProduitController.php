<?php

namespace App\Http\Controllers;


use App\Models\AchatProduit;
use Illuminate\Http\Request;
use App\Action\AchatProduitsAction;
use App\Repository\DepotsRepository;
use App\Repository\AchatProduitsRepository;
use App\Http\Requests\StoreAchatProduitRequest;
use App\Http\Requests\UpdateAchatProduitRequest;
use App\Repository\LivraisonProduitsRepository;

class AchatProduitController extends Controller
{
    private $depotsRepository;
    private $achatProduitsRepository;
    private $livraisonProduitsRepository;


    public function __construct(

        DepotsRepository $depotsRepository,
        AchatProduitsRepository $achatProduitsRepository,
        LivraisonProduitsRepository $livraisonProduitsRepository

    ){
        $this->depotsRepository = $depotsRepository;
        $this->achatProduitsRepository = $achatProduitsRepository;
        $this->livraisonProduitsRepository = $livraisonProduitsRepository;
    }
    

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $listeAchat = $this->achatProduitsRepository->getAllByNum();
        
        return view('achats.listeAchatProduit',
            [
                'liste' => $listeAchat
            ]
        );
    }
   
    /**
     * Summary of store
     * @param Request $request
     * @param AchatProduitsAction $livraison
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, AchatProduitsAction $livraison )
    {
        try {
            //code...
            $achatResponse = $livraison->livraisonAchat($request);

            // dd($achatResponse, 'eto1');

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
     * Summary of show
     * @param int $num
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $num)
    {
        //
        $showListeAchat = $this->achatProduitsRepository->getByNumAchat($num);
        $isRessut = $this->achatProduitsRepository->setRessut($num);
        $numLivraison = $this->livraisonProduitsRepository->getNumLivraison();
        
        return view('achats.writeAchat',
            [
                'achat' => $showListeAchat,
                'isRessut' => $isRessut,
                'livraisonNum' => $numLivraison
            ]
        );

    }

    public function detailsAchat(int $num)
    {
    $showListeAchat = $this->achatProduitsRepository->getByNumAchat($num);
        $isRessut = $this->achatProduitsRepository->setRessut($num);
        
        return view('achats.detailsAchat',
            [
                'achat' => $showListeAchat,
                'isRessut' => $isRessut
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AchatProduit  $achatProduit
     * @return \Illuminate\Http\Response
     */
    public function edit(AchatProduit $achatProduit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAchatProduitRequest  $request
     * @param  \App\Models\AchatProduit  $achatProduit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AchatProduit $achatProduit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AchatProduit  $achatProduit
     * @return \Illuminate\Http\Response
     */
    public function destroy(AchatProduit $achatProduit)
    {
        //
    }
}
