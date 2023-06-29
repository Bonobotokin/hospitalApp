<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenLaboratoire extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation_examens_labo',
        'prix_examen'
    ];
    
}
