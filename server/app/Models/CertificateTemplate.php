<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'template_url',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
