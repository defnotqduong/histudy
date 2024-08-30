<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'position',
        'is_published',
        'course_id',
    ];


    /**
     * Define the relationship with the Course model.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('position', 'asc');
    }

    public function publishedLessons()
    {
        return $this->hasMany(Lesson::class)->where('is_published', true)->orderBy('position', 'asc');
    }

    public static function createChapter($data)
    {
        return self::create($data);
    }

    public static function findById($id)
    {
        return self::find($id);
    }

    public function updateChapter($data)
    {
        return $this->update($data);
    }

    public function deleteChapter()
    {
        return $this->delete();
    }
}
