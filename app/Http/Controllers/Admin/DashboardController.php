<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_students' => User::where('role', 'student')->count(),
            'total_teachers' => User::where('role', 'teacher')->count(),
            'total_courses' => Course::count(),
            'active_courses' => Course::where('status', 'active')->count(),
            'draft_courses' => Course::where('status', 'draft')->count(),
            'total_enrollments' => Enrollment::count(),
        ];

        // Recent activities
        $recentCourses = Course::with('teacher')
            ->latest()
            ->take(5)
            ->get();

        $recentStudents = User::where('role', 'student')
            ->latest()
            ->take(10)
            ->get();

        // Calculate completion rate
        $completedEnrollments = Enrollment::whereNotNull('completed_at')->count();
        $totalEnrollments = Enrollment::count();
        $stats['completion_rate'] = $totalEnrollments > 0 
            ? round(($completedEnrollments / $totalEnrollments) * 100) 
            : 0;

        return view('admin.dashboard', compact('stats', 'recentCourses', 'recentStudents'));
    }
}