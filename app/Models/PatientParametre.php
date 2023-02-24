<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PatientParametre extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'poids',
        'taills',
        'temperature',
        'tension',
        'pouls',
        'frequence'
    ];

    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
