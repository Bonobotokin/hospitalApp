<?php

namespace App\Models;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id'
    ];


    public function personnel() : BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }

    public function consultation() : HasMany 
    {
        return $this->hasMany(Consultation::class);
    }
}
