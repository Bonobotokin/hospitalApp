<?php

namespace App\Action;

use App\Models\Depot;
use App\Models\MouvementDepot;
use App\Repository\DepotsRepository;

class DepotsAction
{

    private $depotsRepository;

    public function __construct(
        DepotsRepository $depotsRepository
    ) {
        $this->depotsRepository = $depotsRepository;
    }

    public function insertProduitsDepots($produits)
    {
    }

    public static function sortantdepots($data)
    {
        
        $dataId = $data['produit_id'];
        $dataQuantite = (int) $data['total_livraison'];
        $produitMedicament = DepotsRepository::medicamentProduits();

        $medicamaentId = $produitMedicament[0]['produits_id'];
        $quantiteMedicament = $produitMedicament[0]['quantite'];

        if ( $dataQuantite > $quantiteMedicament) {
            return false;
        } else {
                        
            $sortieDepots = Depot::find($dataId);
            
            $dataSorti = $sortieDepots['quantite_depots'] - $dataQuantite;
            
            $sortieDepots->update(
                [
                    'quantite_depots' => $dataSorti
                ]
            );
            
            $newMvmDepot = MouvementDepot::create([
                'depot_id' => $sortieDepots->id,
                'magasin_pharmacie_livraison_id' => $data['id'],
                'quantite_mouvement' => $dataQuantite,
                'type_mouvement' => 'sorite'
            ]);

            // dd($newMvmDepot->id);
            return $newMvmDepot->id;
        }
    }



    public static function depotHasQuantite($data)
    {
        $depots = depotsRepository::produitsHasQuantite($data['idProduits']);

        if (($depots[0]['quantite_depots'] == 0) && ($depots[0]['quantite_depots'] <= 50)) {
            return true;
        } else {
            return false;
        }
    }
}
