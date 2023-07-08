<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Examen extends Model
{
    use HasFactory;
    protected $fillable = [
        'examen_laboratoire_id',
        'examen_echographie_id',
        'resultat_examens',
        'observation_examens',
        'finished'
    ];

    public function consultations()
    {
        return $this->belongsToMany(Consultation::class, 'consultation_examen_prescriptions');
    }

    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'consultation_examen_prescriptions');
    }

    public function examenLaboratoire () : BelongsTo
    {
        return $this->belongsTo(ExamenLaboratoire::class);
    }
}
