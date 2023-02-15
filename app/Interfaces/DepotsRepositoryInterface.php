<?php

namespace App\Interfaces;

interface DepotsRepositoryInterface
{

    public function getAll();

    public function getProduitMesdicament();

    public static function medicamentProduits();

    public static function produitsHasQuantite(int $id);


}