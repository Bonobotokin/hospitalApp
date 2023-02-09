<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockPharmacie extends Model
{
    use HasFactory;

    protected $fillable = [
        'conditionnement_pharmacie',
        'quantite_pharmacie',
        'produit_id',
        'pharmacien_id'
    ];

    public function produit () : BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
}
