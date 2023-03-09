<?php

namespace App\Action;

use Exception;
use App\Models\Depot;
use App\Models\Produit;
use App\Models\MouvementDepot;
use App\Models\StockPharmacie;
use App\Models\mouvementPharmacie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\PersonnelRepository;

class ProduitsAction
{
    private $personnelRepository;
    public function __construct(

        PersonnelRepository $personnelRepository
    ) {
        $this->personnelRepository = $personnelRepository;
    }

    public function handleProduits($request)
    {
        $magasinierId = Auth::user()->id;

        try {
            $data = DB::transaction(function () use ($request, $magasinierId) {

                $equipeFourniture = $this->personnelRepository->getPersonnelConnected($magasinierId);

                // dd($equipeFourniture);
                if ($equipeFourniture->isEmpty()) {
                    return [
                        "data" => null,
                        "message" => "Vous ne peut pas faire cette action car elle est attribuer aux responsable de magasin"
                    ];
                } else if (isset($request['id'])) {
                    
                    $produitUpdate = Produit::where('id', $request['id'])
                        ->get();
                    foreach ($produitUpdate as $update) {
                        $update->designation_produits =  $request['designation'];
                        $update->type_produits =  $request['type'];
                        $update->fabriquant =  $request['fabriquant'];
                        $update->categorie =  $request['categori'];
                        $update->prix_vente_produits =  $request['prix_vente'];
                        $update->save();
                    }
                
                    return [

                        "data"    => $produitUpdate,
                        "message" => "la modification du produit a été bien effectué",
                    ];
                } else {

                    $produits = Produit::Create([
                        'designation_produits' => $request['designation'],
                        'abreviation_produits' => $request['abrev'],
                        'type_produits' => $request['type'],
                        'fabriquant' => $request['fabriquant'],
                        'categorie' => $request['categori'],
                        'prix_vente_produits' => $request['prix_vente']
                    ]);
                    $produits_id = $produits->id;

                    $depots = $this->insertNewProduitsDepots($produits_id, $equipeFourniture[0]['id']);

                    if (($request['categori'] == 'Medicaments') || ($request['categori'] == 'Fourniture')) {
                        $pharmacie = $this->regenereStockPharmacie($produits_id, $equipeFourniture[0]['id']);
                    }

                    return [

                        "data"    => $produits_id,
                        "message" => "L'enregistré de $produits->designation_produits a été bien effectué",
                    ];
                }
            });
            return $data;
        } catch (Exception $th) {
            // dd($th, "eto pharmacie");
            return $th;
        }
    }


    public function insertNewProduitsDepots($produits, $magasinier)
    {
        $depots = Depot::create([
            'conditionnement_depots' => null,
            'quantite_depots' => 0,
            'produit_id' => $produits,
            'magasinier_id' => $magasinier
        ]);


        $initialisationDepot = MouvementDepot::create([

            'depot_id' => $depots->id,
            'livraison_produits_id' => null,
            'magasin_pharmacie_livraison_id' => null,
            'quantite_mouvement' => 0,
            'type_mouvement'  => 'Initialisation du Depot'

        ]);

        return $depots;
    }


    public function regenereStockPharmacie($produits, $pharmacien)
    {

        $pharmacie = StockPharmacie::create([
            'conditionnement_pharmacie' => null,
            'quantite_pharmacie' => 0,
            'produit_id' => $produits,
            'pharmacien_id' => $pharmacien
        ]);
        $initialisationStock = mouvementPharmacie::create([

            'stock_pharmacie_id' => $pharmacie->id,
            'mouvement_depot_id' => null,
            'magasin_pharmacie_livraison_id' => null,
            'quantite_mvm_pharmacie' => 0,
            'type_mvm_pharmacie'  => 'Initialisation du Stocage'

        ]);
        return $pharmacie;
    }
}
