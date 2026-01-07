<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    $courses = Course::all(); 
    return view('admindashboard', compact('courses'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'verified'])->group(function () {
    
    // Admin Routes
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admindashboard');
        })->name('admindashboard');
        
        Route::get('/students', function () {
            $students = \App\Models\User::where('role', 'student')->get();
            return view('admin.students', compact('students'));
        })->name('admin.students');
        
        Route::get('/courses', function () {
            $courses = \App\Models\Course::all();
            return view('admin.courses', compact('courses'));
        })->name('admin.courses');
        
        Route::get('/teacher', function () {
            $teachers = \App\Models\User::where('role', 'teacher')->get();
            return view('admin.teacher', compact('teachers'));
        })->name('admin.teacher');
    });
    
    // Teacher Routes
    Route::prefix('teacher')->group(function () {
        Route::get('/dashboard', function () {
            $courses = \App\Models\Course::all();
            return view('teacherdashboard', compact('courses'));
        })->name('teacher.dashboard');
        
        Route::get('/assignments', function () {
            return view('teacher.assignments');
        })->name('teacher.assignments');
        
        Route::get('/students', function () {
            return view('teacher.students');
        })->name('teacher.students');
    });
    
    // Student Routes
    Route::prefix('student')->group(function () {
        Route::get('/dashboard', function () {
            $courses = \App\Models\Course::all();
            return view('studentdashboard', compact('courses'));
        })->name('student.dashboard');
        
        Route::get('/courses', function () {
            return view('student.courses');
        })->name('student.courses');
        
        Route::get('/assignments', function () {
            return view('student.assignments');
        })->name('student.assignments');
    });
});