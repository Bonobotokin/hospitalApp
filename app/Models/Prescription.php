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


    public function consultation () : HasMany
    {
        return $this->hasMany(Consultation::class);
    }

    public function produit () : BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
}
