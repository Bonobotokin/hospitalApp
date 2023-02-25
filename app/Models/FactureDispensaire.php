<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureDispensaire extends Model
{
    use HasFactory;

    protected $fillable = [ 

        'num_facture_patient',
        'prescription_id',
        'consultation_id'

    ];
}
