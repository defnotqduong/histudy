<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
}
