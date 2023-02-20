<?php
namespace App\Repository;

use App\Interfaces\FonctionsRepositoryInterface;
use App\Models\Fonctions;
use Illuminate\Support\Facades\DB;
use App\Models\Fonction;

class FonctionsRepository implements FonctionsRepositoryInterface
{
    public function getAllFonctions()
    {
        return Fonction::all();
    }
}