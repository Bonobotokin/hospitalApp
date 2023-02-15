<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mouvementPharmacie extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_pharmacie_id',
        'mouvement_depot_id',
        'magasin_pharmacie_livraison_id',
        'quantite_mvm_pharmacie',
        'type_mvm_pharmacie'
    ];
}
