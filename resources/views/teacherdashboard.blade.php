@extends('layouts.app')

@section('title', 'Teacher Dashboard - LearnHub')

@section('page-title', 'Teacher Dashboard')
@section('page-description', 'Manage your courses and students')

@section('sidebar')
    <a href="/teacher/dashboard" class="sidebar-item active">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        Dashboard
    </a>
    
    <a href="/teacher/courses" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        My Courses
    </a>
    
    <a href="/teacher/assignments" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        Assignments
        <span class="ml-auto badge badge-danger">12</span>
    </a>
    
    <a href="/teacher/quizzes" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
        </svg>
        Quizzes
    </a>
    
    <a href="/teacher/students" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
        </svg>
        Students
    </a>
    
    <a href="/teacher/grades" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
        </svg>
        Gradebook
    </a>
    
    <a href="/teacher/calendar" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        Calendar
    </a>
@endsection

@section('content')
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="card animate-slide-in" style="animation-delay: 0.1s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">My Courses</p>
                    <h3 class="text-3xl font-bold mt-2" style="color: var(--primary)">8</h3>
                    <p class="text-sm text-gray-600 mt-2">4 active, 4 draft</p>
                </div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #FF6B35 0%, #E85A2B 100%);">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="card animate-slide-in" style="animation-delay: 0.2s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Students</p>
                    <h3 class="text-3xl font-bold mt-2" style="color: var(--secondary)">542</h3>
                    <p class="text-sm text-green-600 mt-2">↑ 28 new this week</p>
                </div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #004E89 0%, #003D6E 100%);">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="card animate-slide-in" style="animation-delay: 0.3s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Pending Submissions</p>
                    <h3 class="text-3xl font-bold mt-2" style="color: var(--danger)">42</h3>
                    <p class="text-sm text-red-600 mt-2">! Needs grading</p>
                </div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #EF476F 0%, #D63E5E 100%);">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="card animate-slide-in" style="animation-delay: 0.4s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Avg. Rating</p>
                    <h3 class="text-3xl font-bold mt-2 flex items-center gap-2" style="color: var(--accent)">
                        4.8
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </h3>
                    <p class="text-sm text-gray-600 mt-2">From 328 reviews</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions & Schedule -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="card animate-slide-in" style="animation-delay: 0.5s">
            <h3 class="text-lg font-bold mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <button class="w-full btn-primary flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create New Content
                </button>
                <button class="w-full btn-secondary flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Create Quiz
                </button>
                <button class="w-full bg-white border-2 border-gray-200 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:border-gray-300 transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                    Grade Submissions
                </button>
            </div>
        </div>
        
        <div class="lg:col-span-2 card animate-slide-in" style="animation-delay: 0.6s">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">Today's Schedule</h3>
                <button class="text-sm font-semibold hover:underline" style="color: var(--primary)">View Calendar</button>
            </div>
            <div class="space-y-3">
                <div class="flex items-start gap-4 p-4 rounded-lg border-l-4" style="background: linear-gradient(90deg, rgba(255, 107, 53, 0.1) 0%, transparent 100%); border-color: var(--primary)">
                    <div class="text-center flex-shrink-0">
                        <p class="text-2xl font-bold" style="color: var(--primary)">10</p>
                        <p class="text-xs text-gray-500">AM</p>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="badge badge-primary">Live Class</span>
                            <p class="text-sm font-semibold">Advanced Laravel - Module 5</p>
                        </div>
                        <p class="text-xs text-gray-600">Duration: 2 hours • 45 students enrolled</p>
                        <button class="mt-2 text-sm font-semibold hover:underline" style="color: var(--primary)">Start Class →</button>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 rounded-lg border-l-4" style="background: linear-gradient(90deg, rgba(0, 78, 137, 0.1) 0%, transparent 100%); border-color: var(--secondary)">
                    <div class="text-center flex-shrink-0">
                        <p class="text-2xl font-bold" style="color: var(--secondary)">02</p>
                        <p class="text-xs text-gray-500">PM</p>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="badge badge-warning">Deadline</span>
                            <p class="text-sm font-semibold">Grade Quiz Submissions</p>
                        </div>
                        <p class="text-xs text-gray-600">Web Design Quiz • 23 submissions pending</p>
                        <button class="mt-2 text-sm font-semibold hover:underline" style="color: var(--secondary)">Review Now →</button>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 rounded-lg border-l-4" style="background: linear-gradient(90deg, rgba(6, 214, 160, 0.1) 0%, transparent 100%); border-color: var(--success)">
                    <div class="text-center flex-shrink-0">
                        <p class="text-2xl font-bold" style="color: var(--success)">04</p>
                        <p class="text-xs text-gray-500">PM</p>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="badge badge-success">Office Hours</span>
                            <p class="text-sm font-semibold">Student Consultation</p>
                        </div>
                        <p class="text-xs text-gray-600">Available for questions and guidance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Submissions & Top Students -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="card animate-slide-in" style="animation-delay: 0.7s">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">Recent Submissions</h3>
                <a href="/teacher/assignments" class="text-sm font-semibold hover:underline" style="color: var(--primary)">View All</a>
            </div>
            <div class="space-y-3">
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all cursor-pointer">
                    <img src="https://ui-avatars.com/api/?name=Juan+Silva&background=FF6B35&color=fff" alt="Student" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Juan Silva</p>
                        <p class="text-xs text-gray-500">Laravel Project - Final Assignment</p>
                        <p class="text-xs text-gray-400 mt-1">Submitted 15 mins ago</p>
                    </div>
                    <button class="btn-primary text-xs px-4 py-2">Grade</button>
                </div>
                
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all cursor-pointer">
                    <img src="https://ui-avatars.com/api/?name=Maria+Santos&background=004E89&color=fff" alt="Student" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Maria Santos</p>
                        <p class="text-xs text-gray-500">CSS Grid Exercise</p>
                        <p class="text-xs text-gray-400 mt-1">Submitted 1 hour ago</p>
                    </div>
                    <button class="btn-primary text-xs px-4 py-2">Grade</button>
                </div>
                
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all cursor-pointer">
                    <img src="https://ui-avatars.com/api/?name=Pedro+Cruz&background=06D6A0&color=fff" alt="Student" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Pedro Cruz</p>
                        <p class="text-xs text-gray-500">JavaScript Quiz 3</p>
                        <p class="text-xs text-gray-400 mt-1">Submitted 3 hours ago</p>
                    </div>
                    <button class="btn-primary text-xs px-4 py-2">Grade</button>
                </div>
                
                <div class="flex items-center gap-4 p-3 bg-green-50 rounded-lg border border-green-200">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-green-800">All caught up!</p>
                        <p class="text-xs text-green-600">39 more submissions waiting in the queue</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card animate-slide-in" style="animation-delay: 0.8s">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">Top Performing Students</h3>
                <button class="text-sm font-semibold hover:underline" style="color: var(--primary)">View All</button>
            </div>
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-white text-sm" style="background: var(--accent)">
                        1
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Ana+Reyes&background=FF6B35&color=fff" alt="Student" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Ana Reyes</p>
                        <p class="text-xs text-gray-500">Advanced Laravel</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold" style="color: var(--success)">98%</p>
                        <div class="progress-bar w-24 mt-1">
                            <div class="progress-fill" style="width: 98%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-white text-sm" style="background: var(--gray)">
                        2
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Carlos+Mendoza&background=004E89&color=fff" alt="Student" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Carlos Mendoza</p>
                        <p class="text-xs text-gray-500">Advanced Laravel</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold" style="color: var(--success)">95%</p>
                        <div class="progress-bar w-24 mt-1">
                            <div class="progress-fill" style="width: 95%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-white text-sm" style="background: var(--gray)">
                        3
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Isabel+Garcia&background=06D6A0&color=fff" alt="Student" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Isabel Garcia</p>
                        <p class="text-xs text-gray-500">Web Design</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold" style="color: var(--success)">94%</p>
                        <div class="progress-bar w-24 mt-1">
                            <div class="progress-fill" style="width: 94%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-gray-600 text-sm bg-gray-200">
                        4
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Ramon+Torres&background=FFD23F&color=000" alt="Student" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Ramon Torres</p>
                        <p class="text-xs text-gray-500">Advanced Laravel</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold" style="color: var(--success)">92%</p>
                        <div class="progress-bar w-24 mt-1">
                            <div class="progress-fill" style="width: 92%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-gray-600 text-sm bg-gray-200">
                        5
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Sofia+Luna&background=EF476F&color=fff" alt="Student" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Sofia Luna</p>
                        <p class="text-xs text-gray-500">Web Design</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold" style="color: var(--success)">91%</p>
                        <div class="progress-bar w-24 mt-1">
                            <div class="progress-fill" style="width: 91%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection