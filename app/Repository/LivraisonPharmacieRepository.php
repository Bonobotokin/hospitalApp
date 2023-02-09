<?php

namespace App\Repository;

use App\Interfaces\LivraisonPharmacieRepositoryInterface;
use App\Models\MagasinPharmacieLivraison;

class LivraisonPharmacieRepository implements LivraisonPharmacieRepositoryInterface {

    public function seeNumLivraisonIsIn()
    {
        $numIn = MagasinPharmacieLivraison::select('num_livraison')->distinct()->get();

        return $numIn;
    }

}