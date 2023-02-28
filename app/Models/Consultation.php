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
        'prescription_id',
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

    public function prescription() : BelongsTo
    {
        return $this->belongsTo(Prescription::class);
    }

    public function facture () : HasMany
    {
        return $this->hasMany(FactureDispensaire::class);
    }
}
