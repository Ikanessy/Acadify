<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Enrollment;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Role Checks
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    public function isStudent()
    {
        return $this->role === 'student';
    }

    // Relationships
    
    // Courses created by teacher
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // Courses enrolled by student
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
                    ->withPivot('progress', 'enrolled_at', 'completed_at')
                    ->withTimestamps();
    }

    // Assignments submitted
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    // Quiz attempts
    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    // Lesson progress
    public function lessonProgress()
    {
        return $this->hasMany(LessonProgress::class);
    }
}