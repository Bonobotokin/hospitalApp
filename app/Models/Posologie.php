<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posologie extends Model
{
    use HasFactory;

    protected $fillable = [
        'details_posologie',
        'prescriptions_id'
    ];
}
