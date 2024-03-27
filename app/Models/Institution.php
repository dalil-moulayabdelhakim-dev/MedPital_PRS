<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable =[
        'agreement_id',
        'name',
        'location',
        'type_id',
        'opening',
        'closing',
        'work_days'
    ];

    public function institutionType()
    {
        return $this->belongsTo(InstitutionType::class, 'type_id');
    }

    public function analyses()
    {
        return $this->belongsToMany(Analyse::class, 'institution_analyses');
    }

    public function medications()
    {
        return $this->belongsToMany(Medication::class, 'institution_medications');
    }

    public function radios()
    {
        return $this->belongsToMany(Radio::class, 'institution_radios');
    }

    public function agreement()
    {
        return $this->belongsTo(Agreement::class, 'agreement_id');
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

    public function Prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}
