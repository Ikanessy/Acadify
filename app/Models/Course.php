<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'user_id',
        'price',
        'status',
        'duration_hours',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    // Relationships

    // Teacher/Creator of the course
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Course modules
    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('order');
    }

    // All lessons in course (through modules)
    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Module::class);
    }

    // Students enrolled
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments')
                    ->withPivot('progress', 'enrolled_at', 'completed_at')
                    ->withTimestamps();
    }

    // Assignments
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    // Quizzes
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    // Helper methods

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isDraft()
    {
        return $this->status === 'draft';
    }

    public function totalLessons()
    {
        return $this->lessons()->count();
    }

    public function totalStudents()
    {
        return $this->enrollments()->count();
    }
}