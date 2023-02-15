<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommandeProduit extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_commande',
        'produit_id',
        'conditionnement_commande',
        'qunantite_commande',
        'total_commande',
        'observetion',
        'pharmacien_id',
        'magasinier_id'
    ];


    public function produit () :BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
}
