<?php

namespace App\Models;

use App\Models\Magasinier;
use App\Models\AchatProduit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_personneles',
        'sexe_personneles',
        'date_naissance_personneles',
        'lieu_naissance_personneles' ,
        'adresse_personneles',
        'telephone_1_naissance_personneles',
        'telephone_2_naissance_personneles',
        'situation_matrimoniale_personneles',
        'user_id',
        // 'num_roles_personnels'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function magasinier() : HasMany
    {
        return $this->hasMany(Magasinier::class);
    }

    public function achatProduits () : HasMany
    {
        return $this->hasMany(AchatProduit::class);
    }
}
