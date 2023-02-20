<?php

namespace App\Models;

use App\Models\PatientParametre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom_patient',
        'prenom_patient',
        'sexe_patient',
        'Age_patient',
        'profession_patient',
        'adresse_patient',
        'situation_matrimoniale_patient',
        'telephone_1_patient',
        'telephone_2_patient',
        'nomPere_patient',
        'nomMere_patient',
        'nomPere_reference_patient',
        'telephone_reference_patient',
        'IsHospitaled'
    ];

    public function parametres() : BelongsTo
    {
        return $this->belongsTo(PatientParametre::class);
    }

    public function consultations() : HasMany
    {
        return $this->hasMany(Consultation::class);
    }
}
