<?php

namespace App\Interfaces;

interface AchatProduitsRepositoryInterface
{
    public function getAllByNum(); 

    public function getByNumAchat(int $num);

    public function getNumAchatGenered();

    public function setRessut(int $num);

    public function getBydAchatId(int $id);

    public function getMagasinier(int $id);
}