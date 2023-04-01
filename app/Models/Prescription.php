<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'quantite',
        'medecin_id',
        'prix_unitaire',
        'prix_total'
    ];


    public function consultations()
    {
        return $this->belongsToMany(Consultation::class, 'consultation_prescriptions');
    }

    public function produit () : BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }

    public function distribution() : HasMany
    {
        return $this->hasMany(DistributionPharmacie::class);
    }
}
