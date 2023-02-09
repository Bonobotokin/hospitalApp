<?php

namespace App\Action;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\PersonnelRepository;

class CommandeAction {

    private $personnelRepository;

    public function __construct(
        PersonnelRepository $personnelRepository
    )
    {
        $this->personnelRepository = $personnelRepository;
    }

    public function commandeAction ($request)
    {


        try {
            
            $data = DB::transaction( function () use ($request)
            {
                $magasinierId = Auth::user()->id;

                $nombreCommande = $request->nombreCommande;

               dd($nombreCommande);

               if( $nombreCommande == 1 ) {

                    $demandeur = $this->personnelRepository->getPersonnelConnected($magasinierId);

               }

            });

        } catch (\Throwable $th) {
            return $th;
        }
    }
}