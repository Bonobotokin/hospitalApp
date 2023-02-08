<?php

namespace App\Http\Controllers;

use App\Action\LivraisonAction;
use Illuminate\Http\Request;
use App\Models\LivraisonProduits;
use App\Repository\LivraisonProduitsRepository;
use App\Http\Requests\StoreLivraisonProduitsRequest;
use App\Http\Requests\UpdateLivraisonProduitsRequest;

class LivraisonProduitsController extends Controller
{

    private $livraisonProduitsRepository;

    public function __construct(

        LivraisonProduitsRepository $livraisonProduitsRepository

    ){

        $this->livraisonProduitsRepository = $livraisonProduitsRepository;

    }

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $livraisonAll = $this->livraisonProduitsRepository->getAllByNum();

        // dd($livraisonAll);
        return view('Livraison.ListeLivraison',
            [
                'livraison' => $livraisonAll
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
        return view('Livraison.createNewLivraison');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLivraisonProduitsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, LivraisonAction $action)
    {
        try {

            $reponse_depot_livraison = $action->updateDepot($request);

            // dd($reponse_depot_livraison, 'eto1');

            if (!is_null($reponse_depot_livraison['data'])) {

                return redirect()->route('All.Livraison', ['reponse' => $reponse_depot_livraison])->with('success', $reponse_depot_livraison['message']);

            } else {
                return redirect()->back()->withErrors($reponse_depot_livraison)->withInput();
            }
        } catch (\Throwable $th) {

            return $th;

        }
    }

    /**
     * Summary of show
     * @param int $num
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $num)
    {
        $liste = $this->livraisonProduitsRepository->getListeNum($num);
        // dd($liste);
        return view('magasin.validateLivraison',
            [
                'details' => $liste
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LivraisonProduits  $livraisonProduits
     * @return \Illuminate\Http\Response
     */
    public function edit(LivraisonProduits $livraisonProduits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLivraisonProduitsRequest  $request
     * @param  \App\Models\LivraisonProduits  $livraisonProduits
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLivraisonProduitsRequest $request, LivraisonProduits $livraisonProduits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LivraisonProduits  $livraisonProduits
     * @return \Illuminate\Http\Response
     */
    public function destroy(LivraisonProduits $livraisonProduits)
    {
        //
    }
}
