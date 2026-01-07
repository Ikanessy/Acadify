<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    
    public function create() {
        return view('courses.create');
    }

    
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Course created successfully!');
    }

    
public function destroy(Course $course)
{
    $course->delete();
    return redirect()->route('dashboard')->with('success', 'Course deleted successfully!');
}
}
