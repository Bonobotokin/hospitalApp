<?php

namespace App\Interfaces;

interface ConsultationRepositoryInterface
{
    public function getAll(); 
    public function get_patient_consultation_to_day();
    public function date_consultation(); 

    public function getPatientById(int $id);

    


}