<?php

namespace App\Interfaces;

interface ProduitsRepositoryInterface
{

    public function getIdMagasinier(int $id);

    public function getAll();

}