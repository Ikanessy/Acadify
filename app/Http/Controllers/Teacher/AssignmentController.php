<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::whereHas('course', function($query) {
            $query->where('user_id', Auth::id());
        })
        ->withCount('submissions')
        ->latest()
        ->paginate(15);

        return view('teacher.assignments.index', compact('assignments'));
    }

    public function create()
    {
        $courses = Auth::user()->courses;
        return view('teacher.assignments.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructions' => 'nullable|string',
            'max_score' => 'required|integer|min:1',
            'due_date' => 'nullable|date',
            'allow_late_submission' => 'boolean',
        ]);

        // Verify teacher owns the course
        $course = Course::findOrFail($validated['course_id']);
        if ($course->user_id !== Auth::id()) {
            abort(403);
        }

        Assignment::create($validated);

        return redirect()->route('teacher.assignments.index')
            ->with('success', 'Assignment created successfully!');
    }

    public function show(Assignment $assignment)
    {
        if ($assignment->course->user_id !== Auth::id()) {
            abort(403);
        }

        $assignment->load('submissions.student');

        return view('teacher.assignments.show', compact('assignment'));
    }

    public function submissions(Assignment $assignment)
    {
        if ($assignment->course->user_id !== Auth::id()) {
            abort(403);
        }

        $submissions = $assignment->submissions()
            ->with('student')
            ->latest()
            ->paginate(20);

        return view('teacher.assignments.submissions', compact('assignment', 'submissions'));
    }
}