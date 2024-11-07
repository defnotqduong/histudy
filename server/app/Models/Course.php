<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Course extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'instructor_id',
        'title',
        'slug',
        'summary',
        'description',
        'thumbnail_url',
        'price',
        'is_published',
        'category_id',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class)->orderBy('position', 'asc');
    }

    public function publishedChapters()
    {
        return $this->hasMany(Chapter::class)->where('is_published', true)->orderBy('position', 'asc');
    }


    public function customers()
    {
        return $this->belongsToMany(User::class, 'purchases');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageStar()
    {
        $average = $this->reviews()->avg('rating');
        return $average !== null ? (float) $average : 5.0;
    }

    public static function createCourse($data)
    {
        $data['instructor_id'] = Auth::id();
        return self::create($data);
    }

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)
            ->where('is_published', true)
            ->first();
    }

    public function updateCourse(array $data)
    {
        return $this->update($data);
    }

    public function deleteCourse()
    {
        return $this->delete();
    }

    public static function getPopularCourses()
    {
        return self::select('courses.*')
            ->where('courses.is_published', true)
            ->leftJoin('purchases', 'courses.id', '=', 'purchases.course_id')
            ->groupBy('courses.id')
            ->orderByRaw('COUNT(purchases.id) DESC')
            ->orderBy('courses.created_at', 'DESC')
            ->limit(9)
            ->get();
    }

    public function userProgress()
    {
        return $this->hasManyThrough(UserProgress::class, Lesson::class);
    }
}
