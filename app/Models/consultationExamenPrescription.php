<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultationExamenPrescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'consultation_id',
        'prescription_id',
        'examen_id'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }

    public function examen() 
    {
        return $this->belongsTo(Examen::class);
    }
}
