<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'raison_sociale',
        'activite_fournisseur',
        'adresse_fournisseur',
        'nif_fournisseur',
        'num_compte_fournisseur',
        'telephone_fournisseur',
        
    ];
}
