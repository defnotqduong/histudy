<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function courses()
    {
        return $this->hasManyThrough(Course::class, CartItem::class, 'cart_id', 'id', 'id', 'course_id');
    }

    public static function createCart()
    {
        $userId = Auth::id();

        return self::create([
            'user_id' => $userId
        ]);
    }
}
