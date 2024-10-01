<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDiscussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'parent_id',
        'user_id',
        'lesson_id',
    ];

    public function parent()
    {
        return $this->belongsTo(LessonDiscussion::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(LessonDiscussion::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public static function createDiscussion($data)
    {
        return self::create($data);
    }
}
