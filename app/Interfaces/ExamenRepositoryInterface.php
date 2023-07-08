<?php 

namespace App\Interfaces;

interface ExamenRepositoryInterface{
    public function getExamenConsultation(int $id);

    public function getExamenLaboratoireAll();

    public function getExamen(int $id);

    public function getListeExamenLaboratoire();

    public function getDataExamen(int $id);

    public function getAttributeExamen(int $id);


    public function getResultatById(int $id);

    public function getConclusionExamenById($data);
}