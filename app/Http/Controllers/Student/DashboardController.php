<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\LessonProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $student = Auth::user();

        // Enrolled courses with progress
        $enrollments = Enrollment::where('user_id', $student->id)
            ->with('course.teacher')
            ->latest()
            ->take(5)
            ->get();

        // Upcoming assignments
        $upcomingAssignments = Assignment::whereHas('course.enrollments', function($query) use ($student) {
            $query->where('user_id', $student->id);
        })
        ->where('due_date', '>=', now())
        ->with('course')
        ->orderBy('due_date')
        ->take(5)
        ->get();

        // Recent grades
        $recentGrades = Submission::where('user_id', $student->id)
            ->where('status', 'graded')
            ->with('assignment.course')
            ->latest('graded_at')
            ->take(5)
            ->get();

        // Study streak calculation
        $studyStreak = $this->calculateStudyStreak($student->id);

        $stats = [
            'total_courses' => Enrollment::where('user_id', $student->id)->count(),
            'in_progress' => Enrollment::where('user_id', $student->id)->where('progress', '<', 100)->count(),
            'completed' => Enrollment::where('user_id', $student->id)->whereNotNull('completed_at')->count(),
            'assignments_pending' => $this->getPendingAssignmentsCount($student->id),
            'average_grade' => $this->calculateAverageGrade($student->id),
            'study_streak' => $studyStreak,
        ];

        return view('student.dashboard', compact('stats', 'enrollments', 'upcomingAssignments', 'recentGrades'));
    }

    private function calculateStudyStreak($userId)
    {
        // Count consecutive days with lesson progress
        $streak = 0;
        $currentDate = now()->startOfDay();

        while (true) {
            $hasActivity = LessonProgress::where('user_id', $userId)
                ->whereDate('created_at', $currentDate)
                ->exists();

            if (!$hasActivity) {
                break;
            }

            $streak++;
            $currentDate->subDay();
        }

        return $streak;
    }

    private function getPendingAssignmentsCount($userId)
    {
        return Assignment::whereHas('course.enrollments', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->whereDoesntHave('submissions', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->where('due_date', '>=', now())
        ->count();
    }

    private function calculateAverageGrade($userId)
    {
        $submissions = Submission::where('user_id', $userId)
            ->where('status', 'graded')
            ->whereNotNull('score')
            ->get();

        if ($submissions->isEmpty()) {
            return 0;
        }

        $totalPercentage = 0;
        foreach ($submissions as $submission) {
            $percentage = ($submission->score / $submission->assignment->max_score) * 100;
            $totalPercentage += $percentage;
        }

        return round($totalPercentage / $submissions->count());
    }
}