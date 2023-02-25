<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionPharmacie extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'pharmacien_id',
        'distribuer',
        'reste'
    ];
}
