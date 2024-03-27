<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $table = 'users_types';
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
