<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'thumb_url',
        'price',
        'is_published',
        'category_id',
    ];

    public static function createCourse($data)
    {
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']);

        return self::create($data);
    }
}
