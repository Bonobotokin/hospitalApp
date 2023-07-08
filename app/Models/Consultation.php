<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\TypeConsultation;
use App\Models\Medecin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'type_consultation_id',
        'medecin_id',
        'consulted',
        'diagnostique',
        'symptome',
        'prix'
    ];


    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function consultationType() : BelongsTo
    {
        return $this->belongsTo(TypeConsultation::class,'type_consultation_id');
    }

    public function medecin() : BelongsTo
    {
        return $this->belongsTo(Medecin::class);
    }

    
    public function prescription()
    {
        return $this->belongsToMany(Prescription::class, 'consultation_examen_prescriptions');
    }

    public function examens() 
    {
        return $this->belongsToMany(Examen::class, 'consultation_examen_prescriptions')
        ->withTimestamps();
    }

    public function factureDispensaire () : HasMany
    {
        return $this->hasMany(FactureDispensaire::class);
    }
    public function distribution () : HasMany
    {
        return $this->hasMany(DistributionPharmacie::class);
    }
}
