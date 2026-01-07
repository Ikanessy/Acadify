<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\LessonProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    // Browse all courses
    public function index()
    {
        $courses = Course::where('status', 'active')
            ->with('teacher')
            ->withCount('students')
            ->latest()
            ->paginate(12);

        return view('student.courses.index', compact('courses'));
    }

    // My enrolled courses
    public function myCourses()
    {
        $enrollments = Auth::user()->enrollments
            ->load('course.teacher', 'course.modules')
            ->sortByDesc('created_at')
            ->take(12);

        return view('student.courses.my-courses', compact('enrollments'));
    }

    // Course details (before enrollment)
    public function show(Course $course)
    {
        if ($course->status !== 'active') {
            abort(404);
        }

        $course->load('teacher', 'modules.lessons');

        // Check if already enrolled
        $isEnrolled = Auth::user()->enrollments
            ->where('course_id', $course->id)
            ->count() > 0;

        return view('student.courses.show', compact('course', 'isEnrolled'));
    }

    // View enrolled course content
    public function view(Course $course)
    {
        $enrollment = Auth::user()->enrollments
            ->where('course_id', $course->id)
            ->first();
        if (!$enrollment) {
            abort(404);
        }

        $course->load('modules.lessons');

        // Get user's progress for each lesson
        $lessonProgress = LessonProgress::where('user_id', Auth::id())
            ->whereIn('lesson_id', $course->lessons->pluck('id'))
            ->pluck('completed', 'lesson_id');

        return view('student.course-view', compact('course', 'enrollment', 'lessonProgress'));
    }

    // View specific lesson
    public function lesson(Lesson $lesson)
    {
        // Check if student is enrolled in the course
        $enrollment = Auth::user()->enrollments
            ->where('course_id', $lesson->module->course_id)
            ->first();
        if (!$enrollment) {
            abort(404);
        }

        $lesson->load('module.course');

        // Get or create lesson progress
        $progress = LessonProgress::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'lesson_id' => $lesson->id,
            ],
            [
                'completed' => false,
                'watch_time_seconds' => 0,
            ]
        );

        // Get next lesson
        $nextLesson = Lesson::where('module_id', $lesson->module_id)
            ->where('order', '>', $lesson->order)
            ->orderBy('order')
            ->first();

        if (!$nextLesson) {
            // Try next module
            $nextModule = $lesson->module->course->modules()
                ->where('order', '>', $lesson->module->order)
                ->orderBy('order')
                ->first();

            if ($nextModule) {
                $nextLesson = $nextModule->lessons()->orderBy('order')->first();
            }
        }

        return view('student.lesson', compact('lesson', 'progress', 'nextLesson', 'enrollment'));
    }

    // Mark lesson as complete
    public function completeLesson(Request $request, Lesson $lesson)
    {
        // Verify enrollment
        $enrollment = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $lesson->module->course_id)
            ->firstOrFail();

        $progress = LessonProgress::where('user_id', Auth::id())
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        // Mark as complete
        $progress->markComplete();

        return response()->json([
            'success' => true,
            'message' => 'Lesson marked as complete!',
            'course_progress' => $enrollment->fresh()->progress,
        ]);
    }

    // Update watch time (for videos)
    public function updateWatchTime(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'watch_time' => 'required|integer|min:0',
        ]);

        $progress = LessonProgress::where('user_id', Auth::id())
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        $progress->update([
            'watch_time_seconds' => $validated['watch_time'],
        ]);

        return response()->json(['success' => true]);
    }

    // Search courses
    public function search(Request $request)
    {
        $query = $request->input('q');

        $courses = Course::where('status', 'active')
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->with('teacher')
            ->withCount('students')
            ->paginate(12);

        return view('student.courses.search', compact('courses', 'query'));
    }
}