<?php

namespace App\Repository;
use App\Interfaces\PersonnelRepositoryInterface;
use App\Models\Compte;
use App\Models\Magasinier;
use App\Models\Medecin;
use App\Models\Personnel;
use App\Models\PersonnelRole;
use App\Models\ServiceMedicale;

class PersonnelRepository implements PersonnelRepositoryInterface
{

    public function getAllPersonnels()
    {
        $personnels = PersonnelRole::with('personnel','role','fonction')
                            ->get()
                            ->map(function ($personnels)
                            {
                                $dataPersonnel = $personnels->personnel;
                                $dataPersonnelFonction = $personnels->fonction;
                                
                                return
                                [
                                    'personnels_id' => $dataPersonnel->id,
                                    'nom' => $dataPersonnel->nom_personneles,
                                    'sexe' => $dataPersonnel->sexe_personneles,
                                    'telephone_1' => $dataPersonnel->telephone_1_personneles,
                                    'telephone_2' => $dataPersonnel->telephone_1_personneles,
                                    
                                    'fonction' => $dataPersonnelFonction->designation_fonction,
                                ];
                            });
        return $personnels;                            
    }

    public function getPersonnelConnected(int $userId)
    {

        $personnelLogin = Compte::with('personnel','user')->get();

        $personnelMagasinier = Magasinier::with('personnel')
            ->where('personnel_id', $personnelLogin['personnel_id'])
            ->get();
        
        return $personnelMagasinier;
    }

    public function tranPersonnelTovalidate(int $userId)
    {
        $idUser = Personnel::with('User')
            ->select('id')
            ->where('user_id', $userId)
            ->get();

        // $personnelMagasinier = Magasinier::with('personnel')
        //     ->where('personnel_id', $idUser[0]['id'])
        //     ->get();

        return $idUser;
    }

    public function getMedecin()
    {
        $medecin = Medecin::with('personnel')
                        ->get()
                        ->map( function($medecin) {
                            
                            $personnel = $medecin->personnel;
                            return [
                                'id' => $medecin->id,
                                'nom' => $personnel->nom_personneles,
                            ];

                        });
        return $medecin;
    }

    public function getService()
    {
        // $service = ServiceMedicale::all
    }
}