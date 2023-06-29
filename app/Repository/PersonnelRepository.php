<?php

namespace App\Repository;
use App\Interfaces\PersonnelRepositoryInterface;
use App\Models\Compte;
use App\Models\Magasinier;
use App\Models\Medecin;
use App\Models\Personnel;
use App\Models\PersonnelRole;
use App\Models\Pharmacien;
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

    public function getMagasinnier(int $userId)
    {

        $personnelLogin = Compte::with('personnel','user')
                                ->where('user_id', $userId)
                                ->get();
        // dd($personnelLogin);
        $personnelMagasinier = Magasinier::with('personnel')
            ->Where('personnel_id', $personnelLogin[0]['personnel_id'])
            ->get();
        
        return $personnelMagasinier;
    }

    public function getPharmacie(int $userId)
    {

        $personnelLogin = Compte::with('personnel','user')
                                ->where('user_id', $userId)
                                ->get();
        // dd($personnelLogin);
        $personnelPharmacien = Pharmacien::with('personnel')
            ->Where('personnel_id', $personnelLogin[0]['personnel_id'])
            ->get();
        
        
        return $personnelPharmacien;
    }

    public function tranPersonnelTovalidate(int $userId)
    {
        $idUser = Compte::with('personnel','user')
                ->where('user_id', $userId)
                ->get()
                ->map( function($idUser) {
                    return [
                        'id' => $idUser->personnel->id
                    ];
                });
        
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