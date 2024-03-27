<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable //implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_card_number',
        'name',
        'date_of_birth',
        'specialty_id',
        'phone',
        'address',
        'gender',
        'email',
        'institution_id',
        'user_type_id',
        'password',
        'ac_status',
        'remember_token',
        'id_card_file'
    ];

    public function prescription()
    {
        return $this->hasMany(Prescription::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }
    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }

    public function user_type()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
