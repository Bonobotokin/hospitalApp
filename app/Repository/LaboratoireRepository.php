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

    public function getElement(array $data)
    {
        foreach ($data as $key => $value) {
            $laboratoireData = ExamenLaboratoire::where('designation_examens_labo', $value)
                                                ->first();
            // Utilisez 'first()' pour obtenir le premier enregistrement correspondant
    
            if ($laboratoireData) {
                // Faites quelque chose avec $laboratoireData s'il existe
                return $laboratoireData;
            } else {
                // Gérez le cas où l'enregistrement n'est pas trouvé
                return false;
            }
        }
    }
    

}