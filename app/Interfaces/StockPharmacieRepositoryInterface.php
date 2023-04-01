<?php

namespace App\Interfaces;

interface StockPharmacieRepositoryInterface {

    public function getAll();

    public function lookOfQuantite();

    public function distribution();

    public function getPrescriptionById(int $id);



}
