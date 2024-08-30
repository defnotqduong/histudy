<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'attachment_url',
        'attachment_public_id',
        'lesson_id',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public static function createAttachment($data)
    {
        return self::create($data);
    }

    public function deleteAttachment()
    {
        return $this->delete();
    }
}
