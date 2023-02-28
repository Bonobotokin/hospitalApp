<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FactureDispensaire extends Model
{
    use HasFactory;

    protected $fillable = [ 

        'num_facture_patient',
        'consultation_id',
        'isNotPayed'

    ];


    public function consultation () : BelongsTo 
    {
        return $this->belongsTo(Consultation::class);
    }
}
