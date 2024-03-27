<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'prescription_analyses');
    }

    public function institutions()
    {
        return $this->belongsToMany(Institution::class, 'institution_analyses');
    }
}
