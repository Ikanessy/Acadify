<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function show(Quiz $quiz)
    {
        // Verify enrollment
        $enrollment = Auth::user()->enrollments
            ->where('course_id', $quiz->course_id)
            ->firstOrFail();

        $quiz->load('questions');

        // Get user's attempts
        $attempts = QuizAttempt::where('quiz_id', $quiz->id)
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        // Check if can attempt
        $canAttempt = $quiz->canAttempt(Auth::id());

        return view('student.quizzes.show', compact('quiz', 'attempts', 'canAttempt'));
    }

    public function start(Quiz $quiz)
    {
        // Verify enrollment
        $enrollment = Auth::user()->enrollments
            ->where('course_id', $quiz->course_id)
            ->firstOrFail();

        // Check if can attempt
        if (!$quiz->canAttempt(Auth::id())) {
            return redirect()->back()->with('error', 'You have reached the maximum number of attempts.');
        }

        // Create new attempt
        $attempt = QuizAttempt::create([
            'quiz_id' => $quiz->id,
            'user_id' => Auth::id(),
            'answers' => [],
            'total_points' => $quiz->totalPoints(),
            'started_at' => now(),
        ]);

        return redirect()->route('student.quizzes.take', $attempt);
    }

    public function take(QuizAttempt $attempt)
    {
        // Verify this is the user's attempt
        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        // Check if already completed
        if ($attempt->completed_at) {
            return redirect()->route('student.quizzes.result', $attempt);
        }

        $quiz = $attempt->quiz;
        $quiz->load('questions');

        // Shuffle questions if enabled
        $questions = $quiz->shuffle_questions 
            ? $quiz->questions->shuffle() 
            : $quiz->questions;

        return view('student.quizzes.take', compact('attempt', 'quiz', 'questions'));
    }

    public function submit(Request $request, QuizAttempt $attempt)
    {
        // Verify this is the user's attempt
        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        // Check if already completed
        if ($attempt->completed_at) {
            return redirect()->route('student.quizzes.result', $attempt)
                ->with('error', 'This quiz has already been submitted.');
        }

        $validated = $request->validate([
            'answers' => 'required|array',
        ]);

        // Save answers
        $attempt->update([
            'answers' => $validated['answers'],
        ]);

        // Calculate score
        $attempt->calculateScore();

        return redirect()->route('student.quizzes.result', $attempt)
            ->with('success', 'Quiz submitted successfully!');
    }

    public function result(QuizAttempt $attempt)
    {
        // Verify this is the user's attempt
        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        $attempt->load('quiz.questions');

        return view('student.quizzes.result', compact('attempt'));
    }
}