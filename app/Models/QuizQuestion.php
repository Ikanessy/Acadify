<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'question',
        'type',
        'options',
        'correct_answer',
        'points',
        'order',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    // Relationships

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Helper methods

    public function checkAnswer($answer)
    {
        if ($this->type === 'essay') {
            return null; // Needs manual grading
        }

        return trim(strtolower($answer)) === trim(strtolower($this->correct_answer));
    }
}