<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index()
    {
        // Get all assignments from enrolled courses
        $assignments = Assignment::whereHas('course.enrollments', function($query) {
            $query->where('user_id', Auth::id());
        })
        ->with('course')
        ->withExists(['submissions as submitted' => function($query) {
            $query->where('user_id', Auth::id());
        }])
        ->latest()
        ->paginate(15);

        return view('student.assignments.index', compact('assignments'));
    }

    public function show(Assignment $assignment)
    {
        // Verify student is enrolled
        $enrollment = Auth::user()->enrollments
            ->where('course_id', $assignment->course_id)
            ->firstOrFail();

        $assignment->load('course');

        // Check if already submitted
        $submission = Submission::where('assignment_id', $assignment->id)
            ->where('user_id', Auth::id())
            ->first();

        return view('student.assignments.show', compact('assignment', 'submission'));
    }

    public function submit(Request $request, Assignment $assignment)
    {
        // Verify enrollment
        $enrollment = Auth::user()->enrollments
            ->where('course_id', $assignment->course_id)
            ->firstOrFail();

        // Check if already submitted
        $existingSubmission = Submission::where('assignment_id', $assignment->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingSubmission) {
            return redirect()->back()->with('error', 'You have already submitted this assignment.');
        }

        // Check deadline
        if ($assignment->due_date && now()->isAfter($assignment->due_date) && !$assignment->allow_late_submission) {
            return redirect()->back()->with('error', 'The deadline for this assignment has passed.');
        }

        $validated = $request->validate([
            'content' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // 10MB max
        ]);

        $submissionData = [
            'assignment_id' => $assignment->id,
            'user_id' => Auth::id(),
            'content' => $validated['content'] ?? null,
            'status' => 'pending',
            'submitted_at' => now(),
        ];

        if ($request->hasFile('file')) {
            $submissionData['file_path'] = $request->file('file')->store('submissions', 'public');
        }

        Submission::create($submissionData);

        return redirect()->route('student.assignments.show', $assignment)
            ->with('success', 'Assignment submitted successfully!');
    }

    public function downloadFile(Submission $submission)
    {
        // Verify this is the student's submission
        if ($submission->user_id !== Auth::id()) {
            abort(403);
        }

        if (!$submission->file_path) {
            abort(404);
        }

        $filePath = Storage::disk('public')->path($submission->file_path);
        if (!file_exists($filePath)) {
            abort(404);
        }
        return response()->download($filePath);
    }
}