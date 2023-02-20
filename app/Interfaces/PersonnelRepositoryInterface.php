<?php

namespace App\Interfaces;


interface PersonnelRepositoryInterface
{
    public function getAllPersonnels();

    public function getPersonnelConnected(int $UserId);

    public function tranPersonnelTovalidate(int $UserID);

    public function getMedecin();

    public function getService();
}   