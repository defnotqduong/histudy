<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function courses()
    {
        return $this->hasManyThrough(Course::class, WishlistItem::class, 'wishlist_id', 'id', 'id', 'course_id');
    }

    public static function createWishlist($userId)
    {
        return self::create([
            'user_id' => $userId
        ]);
    }
}
