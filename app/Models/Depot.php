<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Personnel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depot extends Model
{
    use HasFactory;

    protected $fillable = [
        'conditionnement_depots',
        'quantite_depots',
        'produit_id',
        'magasinier_id'
    ];

    public function produit () : BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }

    /**
     * Summary of magasinier
     * @return BelongsTo
     */
    public function magasinier () : BelongsTo
    {
        return $this->belongsTo(Magasinier::class, 'magasinier_id');
    }
}
