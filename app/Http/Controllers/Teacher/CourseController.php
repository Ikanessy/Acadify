<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('user_id', Auth::id())
            ->withCount('students', 'modules')
            ->latest()
            ->paginate(10);

        return view('teacher.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('teacher.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'duration_hours' => 'nullable|integer|min:0',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'draft'; // Default to draft

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('course-thumbnails', 'public');
        }

        $course = Course::create($validated);

        return redirect()->route('teacher.courses.show', $course)
            ->with('success', 'Course created! Now add modules and lessons.');
    }

    public function show(Course $course)
    {
        // Check if teacher owns this course
        if ($course->user_id !== Auth::id()) {
            abort(403);
        }

        $course->load('modules.lessons', 'students');

        return view('teacher.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        if ($course->user_id !== Auth::id()) {
            abort(403);
        }

        return view('teacher.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        if ($course->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'duration_hours' => 'nullable|integer|min:0',
            'status' => 'required|in:draft,active,archived',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($course->thumbnail) {
                Storage::disk('public')->delete($course->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('course-thumbnails', 'public');
        }

        $course->update($validated);

        return redirect()->route('teacher.courses.show', $course)
            ->with('success', 'Course updated successfully!');
    }

    // Module Management
    public function storeModule(Request $request, Course $course)
    {
        if ($course->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer|min:0',
        ]);

        $validated['course_id'] = $course->id;

        Module::create($validated);

        return redirect()->back()->with('success', 'Module added successfully!');
    }

    // Lesson Management
    public function storeLesson(Request $request, Module $module)
    {
        if ($module->course->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'type' => 'required|in:video,text,quiz,assignment',
            'video_url' => 'nullable|url',
            'duration_minutes' => 'nullable|integer|min:0',
            'order' => 'required|integer|min:0',
            'is_preview' => 'boolean',
        ]);

        $validated['module_id'] = $module->id;

        Lesson::create($validated);

        return redirect()->back()->with('success', 'Lesson added successfully!');
    }
}