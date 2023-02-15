<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouvementDepot extends Model
{
    use HasFactory;

    protected $fillable = [
        'depot_id',
        'livraison_produits_id',
        'magasin_pharmacie_livraison_id',
        'quantite_mouvement',
        'type_mouvement'
    ];
}
