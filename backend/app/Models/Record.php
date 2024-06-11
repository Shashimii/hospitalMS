<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient',
        'diagnosis',
        'doctor',
        'date',
        'doctor_id',
        'patient_id'
    ];
}
