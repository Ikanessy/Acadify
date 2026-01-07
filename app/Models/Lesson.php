<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'title',
        'content',
        'type',
        'video_url',
        'duration_minutes',
        'order',
        'is_preview',
    ];

    protected $casts = [
        'is_preview' => 'boolean',
    ];

    // Relationships

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function course()
    {
        return $this->module->course();
    }

    // Progress tracking
    public function progress()
    {
        return $this->hasMany(LessonProgress::class);
    }

    // Check if user completed this lesson
    public function isCompletedBy($userId)
    {
        return $this->progress()
                    ->where('user_id', $userId)
                    ->where('completed', true)
                    ->exists();
    }

    // Assignments linked to this lesson
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    // Quizzes linked to this lesson
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}