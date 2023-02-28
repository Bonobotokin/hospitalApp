<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repository\FactureRepository;

class facturePatienApiContronller extends Controller
{

    protected $factureRepository;

    public function __construct(
        FactureRepository $factureRepository
    )
    {
        $this->factureRepository = $factureRepository;
    }

    public function facturePatient()
    {   


        return $this->factureRepository->getAll();
    }
}
