<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GradeController extends Controller
{
    public function show(Submission $submission)
    {
        // Verify teacher owns the course
        if ($submission->assignment->course->user_id !== Auth::id()) {
            abort(403);
        }

        $submission->load('student', 'assignment');

        return view('teacher.grade', compact('submission'));
    }

    public function update(Request $request, Submission $submission)
    {
        if ($submission->assignment->course->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'score' => 'required|integer|min:0|max:' . $submission->assignment->max_score,
            'feedback' => 'nullable|string',
        ]);

        $submission->grade(
            $validated['score'],
            $validated['feedback'] ?? null,
            Auth::id()
        );

        return redirect()->back()->with('success', 'Submission graded successfully!');
    }

    public function downloadSubmission(Submission $submission)
    {
        if ($submission->assignment->course->user_id !== Auth::id()) {
            abort(403);
        }

        if (!$submission->file_path) {
            abort(404);
        }

        $filePath = Storage::disk('public')->path($submission->file_path);
        return response()->download($filePath);
    }
}