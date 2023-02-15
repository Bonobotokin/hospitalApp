<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagasinPharmacieLivraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_livraison',
        'num_commande',
        'conditionnement_livraison',
        'quantiter_livraison',
        'total_livraison',
        'type_livraison',
        'observation_livraison',
        'produit_id',
        'validate_magasinier'
    ];
}
