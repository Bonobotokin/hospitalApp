<?php

namespace App\Models;

use App\Models\Personnel;
use App\Models\Role;
use App\Models\Fonction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonnelRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'role_id', 
        'fonction_id'
    ];


    public function personnel () : BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }

    public function role () : BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function fonction () : BelongsTo
    {
        return $this->belongsTo(Fonction::class);
    }
}
