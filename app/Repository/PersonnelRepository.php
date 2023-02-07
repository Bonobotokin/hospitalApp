<?php

namespace App\Repository;
use App\Interfaces\PersonnelRepositoryInterface;
use App\Models\Magasinier;
use App\Models\Personnel;

class PersonnelRepository implements PersonnelRepositoryInterface
{
    public function getPersonnelConnected(int $userId)
    {
        $personnelLogin = Personnel::with('User')
            ->select('id')
            ->where('user_id', $userId)
            ->get();

        $personnelMagasinier = Magasinier::with('personnel')
            ->where('personnel_id', $personnelLogin[0]['id'])
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
}