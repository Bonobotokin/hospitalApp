<?php

namespace App\Interfaces;

interface StockPharmacieRepositoryInterface {

    public function getAll();

    public function lookOfQuantite();

    public static function produitStoque(int $id);

    // public function listeDistribution();

}
