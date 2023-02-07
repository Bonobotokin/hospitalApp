<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Personnel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AchatProduit extends Model
{
    use HasFactory;
    protected $fillable = [
        'numAchat',
        'produit_id',
        'demandeur',
        'magasinier_id',
        'conditionnnement_achat',
        'quantite_achat',
        'prix_achat',
        'Isvalide',
        'personnelValidate'
    ];

    public function produit () : BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }

    public function demandeur () : BelongsTo
    {
        return $this->belongsTo(Magasinier::class, 'demandeur');
    }

    public function personnel () : BelongsTo
    {
        return $this->belongsTo(Personnel::class, 'personnelValidate');
    }

    public function livraison() : HasMany
    {
        return $this->hasMany(LivraisonProduits::class);
    }
}
