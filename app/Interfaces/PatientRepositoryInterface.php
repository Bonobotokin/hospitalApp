<?php
namespace App\Interfaces;

interface patientRepositoryInterface
{
    public function get_all_not_hospitaled();
    public function getParametrepatient(int $id);
    public function findMatricule(string $matricule);
}