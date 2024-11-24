<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_url',
        'is_published'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public static function getAllCategories()
    {
        return self::where('is_published', true)->orderBy('name', 'asc')->get();
    }

    public static function getPopularCategories()
    {
        return self::withCount([
            'courses' => function ($query) {
                $query->where('is_published', true);
            }
        ])
            ->having('courses_count', '>', 0)
            ->orderBy('courses_count', 'desc')
            ->limit(8)
            ->get();
    }
}
