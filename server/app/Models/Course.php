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
        'user_id',
        'title',
        'slug',
        'summary',
        'description',
        'thumb_url',
        'thumb_public_id',
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

    public function user()
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


    public function attachments()
    {
        return $this->hasMany(Attachment::class)->orderBy('created_at', 'desc');
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
        return (float) $this->reviews()->avg('star') ?? 5.0;
    }

    public static function createCourse($data)
    {
        $data['user_id'] = Auth::id();
        return self::create($data);
    }

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)
            ->where('is_published', true)
            ->first();
    }

    public function updateCourse(array $data): bool
    {
        if (isset($data['title'])) {
            $data['slug'] = Str::slug($data['title']);
        }
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
            ->limit(10)
            ->get();
    }
}
