<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationPrescription extends Model
{
    use HasFactory;

    protected $table = 'consultation_prescriptions';

    protected $fillable = [
        'consultation_id',
        'prescription_id'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
