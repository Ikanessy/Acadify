<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $teacher = Auth::user();

        // Get courses taught by the teacher
        $courses = Course::where('teacher_id', $teacher->id)
            ->withCount('students')
            ->get();

        // Pending submissions across all courses
        $pendingSubmissions = Submission::whereHas('assignment', function($query) use ($teacher) {
            $courseIds = Course::where('teacher_id', $teacher->id)->pluck('id');
            $query->whereIn('course_id', $courseIds);
        })
        ->where('status', 'pending')
        ->with('assignment', 'student')
        ->latest()
        ->take(10)
        ->get();

        // Top students
        $topStudents = []; // You can implement ranking logic here

        $stats = [
            'total_courses' => $courses->count(),
            'active_courses' => $courses->where('status', 'active')->count(),
            'draft_courses' => $courses->where('status', 'draft')->count(),
            'total_students' => $courses->sum('students_count'),
            'pending_submissions' => $pendingSubmissions->count(),
        ];

        return view('teacher.dashboard', compact('stats', 'courses', 'pendingSubmissions', 'topStudents'));
    }
}