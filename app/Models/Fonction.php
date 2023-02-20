<?php

namespace App\Models;

use App\Models\PersonnelRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fonction extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation_fonction'
    ];

    public function personnelRole () : HasMany
    {
        return $this->hasMany(PersonnelRole::class);
    }
}
