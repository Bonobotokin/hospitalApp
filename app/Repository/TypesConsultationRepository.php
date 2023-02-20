<?php 

namespace App\Repository;

use App\Interfaces\TypesConsultationRepositoryInterface;
use App\Models\TypeConsultation;

class TypesConsultationRepository implements TypesConsultationRepositoryInterface
{

    public function getAll()
    {
        $typeConsultation = TypeConsultation::all();

        return $typeConsultation;
    }

}