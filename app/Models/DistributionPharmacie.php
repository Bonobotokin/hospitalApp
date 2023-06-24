<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DistributionPharmacie extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'facture_dispensaires_id',
        'pharmacien_id',
        'distribuer',
        'reste'
    ];


    public function prescriptions() : BelongsToMany
    {
        return $this->belongsToMany(Prescription::class, 'distribution_prescription');
    }
    public function consultation () : BelongsTo 
    {
        return $this->belongsTo(Consultation::class);
    }

    public function factureDispensaire () : BelongsTo 
    {
        return $this->belongsTo(FactureDispensaire::class);
    }
}
