<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'teacher')
            ->withCount('courses')
            ->latest()
            ->paginate(20);

        return view('admin.teachers', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'teacher';

        User::create($validated);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher created successfully!');
    }

    public function show(User $teacher)
    {
        if ($teacher->role !== 'teacher') {
            abort(404);
        }

        $teacher->load('courses');
        
        $courses = $teacher->courses()
            ->withCount('students')
            ->latest()
            ->get();

        return view('admin.teachers.show', compact('teacher', 'courses'));
    }

    public function destroy(User $teacher)
    {
        if ($teacher->role !== 'teacher') {
            abort(404);
        }

        $teacher->delete();

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher deleted successfully!');
    }
}