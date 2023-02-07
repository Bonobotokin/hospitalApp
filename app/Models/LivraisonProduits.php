<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Magasinier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LivraisonProduits extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_livraison',
        'num_facture',
        'numAchat',
        'conditionnement_livraison',
        'quantiter_livraison',
        'prix_livraison',
        'type_livraison',
        'fournisseur_id',
        'produit_id',
        'validate_magasinier'
    ];

    public function produit () : BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }

    public function achatProduits() : BelongsTo
    {
        return $this->belongsTo(AchatProduit::class, 'numAchat');
    }

    public function magasinier() : BelongsTo
    {
        return $this->belongsTo(Magasinier::class, 'validate_magasinier');
    }
}
