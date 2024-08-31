<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'username',
        'email',
        'background_image',
        'avatar',
        'profession',
        'bio',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'profession',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function purchasedCourses()
    {
        return $this->belongsToMany(Course::class, 'purchases');
    }

    public function cart()
    {
        return $this->belongsToMany(Course::class, 'carts');
    }

    public function wishlist()
    {
        return $this->belongsToMany(Course::class, 'wishlists');
    }
}
