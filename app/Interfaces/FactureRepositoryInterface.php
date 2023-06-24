<?php 

namespace App\Interfaces;


interface FactureRepositoryInterface 
{

    public function getAll();

    // public function getPrescription($id);

    // public function getConsultation($id);

    public function getFacture(int $numFacture);

}