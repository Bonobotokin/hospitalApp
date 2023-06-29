<?php

namespace App\Interfaces;


interface PersonnelRepositoryInterface
{
    public function getAllPersonnels();

    public function getMagasinnier(int $UserId);

    public function tranPersonnelTovalidate(int $UserID);

    public function getMedecin();

    public function getService();
    public function getPharmacie(int $UserId);
}   