<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeConsultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_consultaion',
        'prix_consultation'
    ];

    public function consultations() : HasMany
    {
        return $this->hasMany(Consultation::class);
    }
}
