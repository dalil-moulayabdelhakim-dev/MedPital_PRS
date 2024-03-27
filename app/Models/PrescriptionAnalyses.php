<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionAnalyses extends Model
{
    use HasFactory;

    protected $table = 'prescription_analyses';
    protected $fillable = [
        'prescription_id',
        'analyse_id'
    ];
}
