<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\Magasinier;
use App\Models\AchatProduit;
use App\Interfaces\AchatProduitsRepositoryInterface;

class AchatProduitsRepository implements AchatProduitsRepositoryInterface
{

    public function getAllByNum()
    {
        $achat = AchatProduit::with('produit')
            ->select('numAchat', 'created_at','Isvalide')
            ->distinct()
            ->get()

            ->map(function ($achat) {

                $date = Carbon::parse($achat->created_at)->format('m/d/Y');

                return [
                    'numAchat' => $achat->numAchat,
                    'date'=> $date,
                    'ressut' => $achat->Isvalide
                ];
            });
    // dd($achat);
        return $achat;
    }

    public function getMagasinier(int $id)
    {
        $magasinier = Magasinier::with('personnel')
            ->where('id', $id)
            ->get()
            ->map(function ($magasinier) {
                return [
                    'nom' => $magasinier->personnel->nom_personneles
                ];
            });
        
        return $magasinier;
    }

    /**
     * select by numAchat
     * */ 
    public function getByNumAchat(int $num)
    {

        $liste = AchatProduit::with('produit','personnel','demandeur')
                    ->where('numAchat', $num)
                   
                    ->get()
                    ->map(function ($liste) {
                        // dd($liste->demandeur);
                        $dateAchat = Carbon::parse($liste->created_at)->format('m/d/Y');
                        $produits = $liste->produit;
                        $administrator = $liste->personnel;
                        $demandeur = $liste->demandeur;
                        $demandeur_nom = $this->getMagasinier($demandeur);
                        // dd(is_null($administrator)? null : $administrator->nom_personneles);
                        return [
                            'nom_personneles' => is_null($administrator) ? null: $administrator->nom_personneles,
                            'demandeur' => $demandeur_nom[0]['nom'],
                            'achat_id' => $liste->id,
                            'numAchat' => $liste->numAchat,
                            'ressut' => $liste->ressut,
                            'produits_id' => $produits->id,
                            'conditionnnement_achat' => $liste->conditionnnement_achat,
                            'quantite_achat' => $liste->quantite_achat,
                            'designation' =>    $produits->designation_produits,
                            'abrev' =>    $produits->abreviation_produits,
                            'prix_achat' => $produits->prix_achat_produits,
                            'prix_vente' => $produits->prix_vente_produits,
                            'fabriquant' => $produits->fabriquant,
                            'types' => $produits->type_produits,
                            'categorie' =>$produits->categorie,
                            "date" => $dateAchat,
                        ];
                    });
        return $liste;
    }


    public function getNumAchatGenered()
    {
        $numGenered = AchatProduit::select('numAchat')->distinct()->get();

        return $numGenered;
    }


    public function setRessut(int $num)
    {

        $result = AchatProduit::select('Isvalide')
                                ->where('numAchat', $num)
                                ->distinct()
                                ->get();
        return $result;
        

    }

    public function getBydAchatId(int $id)
    {
        
        $achatOne = AchatProduit::with('produit')
            ->where('id', $id)
            ->get()
            ->map(function ($achatOne) {

                $dateAchat = Carbon::parse($achatOne->created_at)->format('m/d/Y');
                $produits = $achatOne->produit;
                
                return [
                    'achat_id' => $achatOne->id,
                    'numAchat' => $achatOne->numAchat,
                    'produits_id' => $produits->produits_id,
                    'conditionnnement_achat' => $achatOne->conditionnnement_achat,
                    'quantite_achat' => $achatOne->quantite_achat,
                    'designation' =>    $produits->designation_produits,
                    'prix_achat' => $produits->prix_achat_produits,
                    'prix_vente' => $produits->prix_vente_produits,
                    'fabriquant' => $produits->fabriquant,
                    'types' => $produits->types,
                    'categorie' =>$produits->categorie,
                    "date" => $dateAchat,
                ];
            });
        
        return $achatOne;
    }
}
