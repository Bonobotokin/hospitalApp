<?php

namespace App\Models;

use App\Models\Personnel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Magasinier extends Model
{
    use HasFactory;
    protected $fillable = ['personnel_id'];

    public function personnel() : BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }

    /**
     * Un mgasinier gere
     * @depot 
     * @return HasMany
     */
    public function depot() : HasMany
    {
        return $this->hasMany(Depot::class);
    }

    public function livraisonProduit () : HasMany
    {
        return $this->hasMany(LivraisonProduits::class);
    }
}
