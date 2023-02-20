<?php

namespace App\Models;

use App\Models\Personnel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compte extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'personnel_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function personnel() : BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }
}
