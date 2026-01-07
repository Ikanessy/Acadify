<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function enroll(Course $course)
    {
        // Check if course is active
        if ($course->status !== 'active') {
            return redirect()->back()->with('error', 'This course is not available for enrollment.');
        }

        // Check if already enrolled
        $existingEnrollment = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->first();

        if ($existingEnrollment) {
            return redirect()->route('student.courses.view', $course)
                ->with('info', 'You are already enrolled in this course.');
        }

        // Create enrollment
        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'progress' => 0,
            'enrolled_at' => now(),
        ]);

        return redirect()->route('student.courses.view', $course)
            ->with('success', 'Successfully enrolled in ' . $course->title . '!');
    }

    public function unenroll(Course $course)
    {
        $enrollment = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->firstOrFail();

        $enrollment->delete();

        return redirect()->route('student.courses.index')
            ->with('success', 'You have been unenrolled from ' . $course->title);
    }

    public function certificate(Course $course)
    {
        $enrollment = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->whereNotNull('completed_at')
            ->firstOrFail();

        // Generate certificate
        // You can use a PDF library here like DomPDF or TCPDF

        return view('student.certificate', compact('course', 'enrollment'));
    }
}