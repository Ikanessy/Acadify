<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher', 'enrollments')
            ->withCount('students')
            ->latest()
            ->paginate(10);

        return view('admin.courses', compact('courses'));
    }

    public function create()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.courses.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'user_id' => 'required|exists:users,id',
            'price' => 'required|numeric|min:0',
            'duration_hours' => 'nullable|integer|min:0',
            'status' => 'required|in:draft,active,archived',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('course-thumbnails', 'public');
        }

        Course::create($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {
        $course->load('teacher', 'modules.lessons', 'enrollments.student');
        
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.courses.edit', compact('course', 'teachers'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'user_id' => 'required|exists:users,id',
            'price' => 'required|numeric|min:0',
            'duration_hours' => 'nullable|integer|min:0',
            'status' => 'required|in:draft,active,archived',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($course->thumbnail) {
                Storage::disk('public')->delete($course->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('course-thumbnails', 'public');
        }

        $course->update($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        if ($course->thumbnail) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course deleted successfully!');
    }

    public function archive(Course $course)
    {
        $course->update(['status' => 'archived']);

        return redirect()->back()
            ->with('success', 'Course archived successfully!');
    }

    public function activate(Course $course)
    {
        $course->update(['status' => 'active']);

        return redirect()->back()
            ->with('success', 'Course activated successfully!');
    }
}