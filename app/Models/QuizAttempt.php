<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'user_id',
        'answers',
        'score',
        'total_points',
        'passed',
        'started_at',
        'completed_at',
    ];

    protected $casts = [
        'answers' => 'array',
        'passed' => 'boolean',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    // Relationships

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper methods

    public function calculateScore()
    {
        $score = 0;
        $questions = $this->quiz->questions;

        foreach ($questions as $question) {
            $userAnswer = $this->answers[$question->id] ?? null;
            
            if ($question->checkAnswer($userAnswer)) {
                $score += $question->points;
            }
        }

        $this->update([
            'score' => $score,
            'total_points' => $questions->sum('points'),
            'passed' => ($score / $questions->sum('points') * 100) >= $this->quiz->passing_score,
            'completed_at' => now(),
        ]);

        return $score;
    }

    public function percentage()
    {
        if ($this->total_points === 0) return 0;
        return round(($this->score / $this->total_points) * 100);
    }
}