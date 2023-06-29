<?php 

namespace App\Repository;
use App\Interfaces\LaboratoireRepositoryInterface;
use App\Models\ExamenLaboratoire;

class LaboratoireRepository implements LaboratoireRepositoryInterface {

    public function getAll()
    {
        $liste = ExamenLaboratoire::get();

        return $liste;
    }

}