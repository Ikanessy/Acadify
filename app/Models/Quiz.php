<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'lesson_id',
        'title',
        'description',
        'time_limit_minutes',
        'passing_score',
        'max_attempts',
        'shuffle_questions',
    ];

    protected $casts = [
        'shuffle_questions' => 'boolean',
    ];

    // Relationships

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    // Helper methods

    public function totalPoints()
    {
        return $this->questions()->sum('points');
    }

    public function userAttempts($userId)
    {
        return $this->attempts()->where('user_id', $userId)->count();
    }

    public function canAttempt($userId)
    {
        return $this->userAttempts($userId) < $this->max_attempts;
    }
}