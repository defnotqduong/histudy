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
        'video_url',
        'video_public_id',
        'position',
        'is_published',
        'is_free',
        'course_id',
    ];

    /**
     * Define the relationship with the Course model.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
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
}
