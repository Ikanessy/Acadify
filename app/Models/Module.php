<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'order',
    ];

    // Relationships

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }

    // Helper methods

    public function totalLessons()
    {
        return $this->lessons()->count();
    }

    public function totalDuration()
    {
        return $this->lessons()->sum('duration_minutes');
    }
}