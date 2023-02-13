<?php

namespace App\Interfaces;

interface LivraisonProduitsRepositoryInterface
{
    public function getAllByNum();

    public function getListeNum(int $num);

    public function getByNumLivraison(int $num);

    public function getNumLivraison();
}