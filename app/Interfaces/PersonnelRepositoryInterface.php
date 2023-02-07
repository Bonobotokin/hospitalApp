<?php

namespace App\Interfaces;


interface PersonnelRepositoryInterface
{
    public function getPersonnelConnected(int $UserId);

    public function tranPersonnelTovalidate(int $UserID);
}