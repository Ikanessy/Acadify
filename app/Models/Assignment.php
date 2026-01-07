<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'lesson_id',
        'title',
        'description',
        'instructions',
        'max_score',
        'due_date',
        'allow_late_submission',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'allow_late_submission' => 'boolean',
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

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    // Helper methods

    public function isOverdue()
    {
        return $this->due_date && now()->isAfter($this->due_date);
    }

    public function pendingSubmissions()
    {
        return $this->submissions()->where('status', 'pending')->count();
    }

    public function gradedSubmissions()
    {
        return $this->submissions()->where('status', 'graded')->count();
    }
}