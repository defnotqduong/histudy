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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createCourse($data)
    {
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']);

        return self::create($data);
    }

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function updateCourse(array $data): bool
    {
        if (isset($data['title'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        return $this->update($data);
    }
}
