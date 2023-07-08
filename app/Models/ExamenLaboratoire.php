<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExamenLaboratoire extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation_examens_labo',
        'prix_examen'
    ];


    public function examens() : HasMany
    {
        return $this->hasMany(Examen::class);
    }
    
}
