<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course_category()
    {
        return $this->hasMany(CourseCategory::class);
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}
