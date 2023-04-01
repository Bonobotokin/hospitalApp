<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DistributionPharmacie extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'pharmacien_id',
        'distribuer',
        'reste'
    ];


    public function prescription() : BelongsTo
    {
        return $this->belongsTo(Prescription::class);
    }
}
