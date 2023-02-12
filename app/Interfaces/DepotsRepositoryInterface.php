<?php

namespace App\Interfaces;

interface DepotsRepositoryInterface
{

    public function getAll();

    public static function produitsHasQuantite(int $id);


}