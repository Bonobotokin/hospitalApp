<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FactureDispensaire extends Model
{
    use HasFactory;

    protected $fillable = [

        // 'num_facture_patient',
        'prix_total',
        'consultation_id',
        'isNotPayed',
        'montant',
        'reste'

    ];


    public function consultation(): BelongsTo
    {
        return $this->belongsTo(Consultation::class);
    }

    public function prescriptions() : BelongsToMany
    {
        return $this->belongsToMany(Prescription::class, 'distribution_prescription');
    }

    public function distribution() : HasMany
    {
        return $this->hasMany(DistributionPharmacie::class);
    }
}
