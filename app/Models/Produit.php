<?php

namespace App\Models;

use App\Models\Depot;
use App\Models\AchatProduit;
use App\Models\StockPharmacie;
use App\Models\LivraisonProduits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation_produits',
        'abreviation_produits',
        'fabriquant',
        'type_produits',
        'categorie',
        'prix_vente_produits',        
    ];

    public function depots() : HasMany
    {
        return $this->hasMany(Depot::class);
    }

    public function achatProduit() : HasMany
    {
        return $this->hasMany(AchatProduit::class);
    }

    public function livraison() : HasMany
    {
        return $this->hasMany(LivraisonProduits::class);
    }

    public function stockPharmacie() : HasMany
    {
        return $this->hasMany(StockPharmacie::class);
    }

    public function commandeProduit() : HasMany
    {
        return $this->hasMany(CommandeProduit::class);
    }

    public function prescription() : HasMany
    {
        return $this->hasMany(Prescription::class);
    }


}
