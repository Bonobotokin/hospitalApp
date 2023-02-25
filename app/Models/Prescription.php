<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'quantite',
        'medecin_id',
        'consultation_id',
        'prix_unitaire',
        'prix_total'
    ];
}
