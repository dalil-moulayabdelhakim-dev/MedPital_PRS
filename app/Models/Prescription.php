<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable =[

        'patient_id',
        'doctor_id',
        'institution_id',
        'type',
        'status'
    ];

    public function medication()
    {
        return $this->belongsToMany(Medication::class, 'prescription_medications');
    }

    public function analyses()
    {
        return $this->belongsToMany(Analyse::class, 'prescription_analyses');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

    public function radios()
    {
        return $this->belongsToMany(Radio::class, 'prescription_radios');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }

}
