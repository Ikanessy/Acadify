<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonProgress extends Model
{
    use HasFactory;

    protected $table = 'lesson_progress';

    protected $fillable = [
        'user_id',
        'lesson_id',
        'completed',
        'completed_at',
        'watch_time_seconds',
    ];

    protected $casts = [
        'completed' => 'boolean',
        'completed_at' => 'datetime',
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    // Helper method to mark as complete
    public function markComplete()
    {
        $this->update([
            'completed' => true,
            'completed_at' => now(),
        ]);

        // Update course progress
        $enrollment = Enrollment::where('user_id', $this->user_id)
            ->where('course_id', $this->lesson->module->course_id)
            ->first();

        if ($enrollment) {
            $enrollment->updateProgress();
        }
    }
}