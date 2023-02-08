<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\LivraisonAction;
use App\Repository\LivraisonProduitsRepository;

class BonReceptionController extends Controller
{
    private $livraisonProduitsRepository;

    public function __construct(

        LivraisonProduitsRepository $livraisonProduitsRepository

    ){

        $this->livraisonProduitsRepository = $livraisonProduitsRepository;

    }
    // 
    public function bonReception()
    {
        $livraisonAll = $this->livraisonProduitsRepository->getAllByNum();

        // dd($livraisonAll);
        return view('magasin.listeLivraison',
            [
                'livraison' => $livraisonAll
            ]
        );
    }

    /**
     * Summary of detailLivraison
     * @param int $num
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detailLivraison(int $num)
    {
        $liste = $this->livraisonProduitsRepository->getListeNum($num);
        // dd($liste);
        return view(
            'magasin.detailsLivraison',
            [
                'details' => $liste
            ]
        );
    }
    public function updateDepotLiivraison(Request $request, LivraisonAction $actionLivraison)
    {

        try {

            $reponse_depot_livraison = $actionLivraison->updateDepot($request);

            // dd($reponse_depot_livraison, 'eto1');

            if (!is_null($reponse_depot_livraison['data'])) {

                return redirect()->route('index.produits', ['reponse' => $reponse_depot_livraison])->with('success', $reponse_depot_livraison['message']);

            } else {
                return redirect()->back()->withErrors($reponse_depot_livraison)->withInput();
            }
        } catch (\Throwable $th) {

            return $th;

        }

    }

}
