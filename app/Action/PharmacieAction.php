<?php

namespace App\Action;

use App\Models\Caisse;
use Illuminate\Support\Facades\DB;
use App\Models\Consultation;
use App\Models\DistributionPharmacie;
use App\Models\FactureDispensaire;
use App\Models\Posologie;
use App\Models\Prescription;
use App\Models\StockPharmacie;
use App\Repository\LivraisonPharmacieRepository;
use App\Repository\PersonnelRepository;
use Illuminate\Support\Facades\Auth;


class PharmacieAction
{

    private $personnelRepository;
    private $livraisonPharmacieRepository;

    public function __construct(

        PersonnelRepository $personnelRepository,
        LivraisonPharmacieRepository $livraisonPharmacieRepository,

    ) {
        $this->personnelRepository = $personnelRepository;
        $this->livraisonPharmacieRepository = $livraisonPharmacieRepository;
    }


    public function updateDistribution($request)
    {

        try {
            $data = DB::transaction(function () use ($request) {

                $pharmacien = Auth::user()->id;

                $pharmacienId = $this->personnelRepository->getPharmacie($pharmacien);

                if ($pharmacienId->isEmpty()) {
                    return [
                        "data" => null,
                        "message" => "Vous ne peut pas faire cette action car elle est attribuer aux responsable de la pharmacie"
                    ];
                } else {

                    $lookDistribution = DistributionPharmacie::where('id', $request->id)
                        ->get();
                    foreach ($lookDistribution as $distribuer) {
                        $distribuer->isDistribued = true;
                        $distribuer->save();
                    }

                    $nombreProduits = (int) $request->nombreProduits;


                    for ($i = 0; $i < $nombreProduits; $i++) {
                        $medoque = $request->$i;
                        // $quantiteSortie =  $medoque['nombreProduits]';
                        // dd($medoque['produits_quantite']);exit;

                        $getIdSortantStock = stockPharmacieAction::sortantstock($medoque);
                        
                        if ($getIdSortantStock === FALSE) {
                            return [
                                "data" => null,
                                "message" => "Desoler, votre de demanade ne peut pas fournir ce demande car votre stock est faibe"
                            ];
                        }

                      
                        // dd($stoquePharmacie);
                    }

                    return [
                        "data" => $distribuer->id,
                        "message" => "Les prescription sont bien distribuer"
                    ];
                }
            });
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
