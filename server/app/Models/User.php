<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


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
        'provider',
        'email_verified_at',
        'is_verified'
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

    public static function findByEmail($email)
    {
        return self::where('email', $email)
            ->first();
    }

    public function instructorCourses()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function purchasedCourses()
    {
        return $this->belongsToMany(Course::class, 'purchases');
    }

    public function orders()
    {
        return $this->hasMany(Purchase::class, 'user_id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'user_id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }

    public function updateUser($data)
    {
        return $this->update($data);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->roles()->detach();
        });
    }
}
