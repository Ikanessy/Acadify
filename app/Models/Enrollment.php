<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'progress',
        'enrolled_at',
        'completed_at',
    ];

    protected $casts = [
        'enrolled_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    // Relationships

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Helper methods

    public function isCompleted()
    {
        return $this->progress >= 100 && $this->completed_at !== null;
    }

    public function updateProgress()
    {
        $totalLessons = $this->course->lessons()->count();
        
        if ($totalLessons === 0) {
            return 0;
        }

        $completedLessons = LessonProgress::where('user_id', $this->user_id)
            ->whereIn('lesson_id', $this->course->lessons()->pluck('id'))
            ->where('completed', true)
            ->count();

        $progress = ($completedLessons / $totalLessons) * 100;
        
        $this->update(['progress' => round($progress)]);

        // Mark as completed if 100%
        if ($progress >= 100 && !$this->completed_at) {
            $this->update(['completed_at' => now()]);
        }

        return $progress;
    }
}