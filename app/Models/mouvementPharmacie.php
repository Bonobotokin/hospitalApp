<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mouvementPharmacie extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_pharmacie_id',
        'magasinier_id',
        'quantite_mvm_pharmacie',
        'type_mvm_pharmacie'
    ];
}
