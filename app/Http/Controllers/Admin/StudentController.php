<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')
            ->withCount('enrollments')
            ->latest()
            ->paginate(20);

        return view('admin.students', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'student';

        User::create($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student created successfully!');
    }

    public function show(User $student)
    {
        if ($student->role !== 'student') {
            abort(404);
        }

        $student->load('enrollments.course');
        
        $enrollments = $student->enrollments()
            ->with('course')
            ->latest()
            ->get();

        return view('admin.students.show', compact('student', 'enrollments'));
    }

    public function destroy(User $student)
    {
        if ($student->role !== 'student') {
            abort(404);
        }

        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully!');
    }
}