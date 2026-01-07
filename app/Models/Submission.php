<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'user_id',
        'content',
        'file_path',
        'score',
        'feedback',
        'status',
        'submitted_at',
        'graded_at',
        'graded_by',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'graded_at' => 'datetime',
    ];

    // Relationships

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function grader()
    {
        return $this->belongsTo(User::class, 'graded_by');
    }

    // Helper methods

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isGraded()
    {
        return $this->status === 'graded';
    }

    public function grade($score, $feedback = null, $gradedBy)
    {
        $this->update([
            'score' => $score,
            'feedback' => $feedback,
            'status' => 'graded',
            'graded_at' => now(),
            'graded_by' => $gradedBy,
        ]);
    }
}