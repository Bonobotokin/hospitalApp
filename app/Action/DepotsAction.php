<?php

namespace App\Action;

use App\Repository\DepotsRepository;

class DepotsAction
{

    private $depotsRepository;

    public function __construct(
        DepotsRepository $depotsRepository
    )
    {
        $this->depotsRepository = $depotsRepository;
    }

    public function insertProduitsDepots($produits)
    {
        
    }

    public static function sortantdepots($data) {
        
        $depots = depotsRepository::produitsHasQuantite($data['idProduits']);
        
        if( ($depots[0]['quantite_depots'] == 0) && ($depots[0]['quantite_depots'] <= 50))
        {
            return true;
        }
        else {
            return false;
        }
        
    }
}
