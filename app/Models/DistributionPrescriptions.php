<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DistributionPrescriptions extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'distribution_pharmacie_id',
        'facture_dispensaires_id',
        'prescription_id',
        'isDistribued',
        'distribuer',
        'reste'
    ];
    public function distributionPharmacie() : BelongsTo
    {
        return $this->belongsTo(DistributionPharmacie::class);
    }

    public function prescription() : BelongsTo
    {
        return $this->belongsTo(Prescription::class);
    }

    public function factureDispensaire() : BelongsTo
    {
        return $this->belongsTo(FactureDispensaire::class);
    }

}
