<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouvementDepot extends Model
{
    use HasFactory;

    protected $fillable = [
        'depot_id',
        'fournisseur_id',
        'quantite_mouvement',
        'type_mouvement'
    ];
}
