<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pharmacien extends Model
{
    use HasFactory;
    protected $fillable = [
        'personnel_id'
    ];


    public function personnel() : BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }
}
