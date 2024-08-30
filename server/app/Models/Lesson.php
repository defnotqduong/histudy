<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'video_url',
        'video_public_id',
        'video_duration',
        'is_published',
        'is_free',
        'position',
        'chapter_id'
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class)->orderBy('created_at', 'desc');
    }

    public static function createLesson($data)
    {
        return self::create($data);
    }


    public function updateLesson($data)
    {
        return $this->update($data);
    }

    public function deleteLesson()
    {
        return $this->delete();
    }
}
