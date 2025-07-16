<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'salutation',
        'user_id',
        'password',
        'first_name',
        'last_name',
        'avatar',
        'email',
        'home_address',
        'country',
        'postal_code',
        'date_of_birth',
        'gender',
        'marital_status',
        'spouse_salutation',
        'spouse_first_name',
        'spouse_last_name',
        'hobbies',
        'favorite_sports',
        'preferred_music_genres',
        'preferred_movies_tv',
    ];

    public function spouse()
    {
        return $this->belongsTo(User::class, 'spouse_id');
    }

    public function inverseSpouse()
    {
        return $this->hasOne(User::class, 'spouse_id');
    }

    public function personalPreference()
    {
        return $this->hasOne(PersonalPreference::class);
    }
}
