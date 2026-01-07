@extends('layouts.app')

@section('title', 'Student Dashboard - LearnHub')

@section('page-title', 'My Learning')
@section('page-description', 'Continue your learning journey')

@section('sidebar')
    <a href="/student/dashboard" class="sidebar-item active">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        Dashboard
    </a>
    
    <a href="/student/courses" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        My Courses
    </a>
    
    <a href="/student/browse" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        Browse Courses
    </a>
    
    <a href="/student/assignments" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        Assignments
        <span class="ml-auto badge badge-warning">3</span>
    </a>
    
    <a href="/student/grades" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
        </svg>
        My Grades
    </a>
    
    <a href="/student/certificates" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
        </svg>
        Certificates
    </a>
    
    <a href="/student/calendar" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        Calendar
    </a>
@endsection

@section('content')
    <!-- Welcome Message with Progress -->
    <div class="card mb-8 animate-slide-in" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color: white;">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <h2 class="text-2xl font-bold mb-2">Welcome back, {{ auth()->user()->name ?? 'Student' }}! 👋</h2>
                <p class="opacity-90 mb-4">You're making great progress this week. Keep it up!</p>
                <div class="flex items-center gap-4">
                    <div>
                        <p class="text-sm opacity-75">Courses in Progress</p>
                        <p class="text-2xl font-bold">5</p>
                    </div>
                    <div>
                        <p class="text-sm opacity-75">Completed Lessons</p>
                        <p class="text-2xl font-bold">24</p>
                    </div>
                    <div>
                        <p class="text-sm opacity-75">Certificates Earned</p>
                        <p class="text-2xl font-bold">2</p>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block">
                <svg class="w-48 h-48 opacity-20" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M44.7,-76.4C58.8,-69.2,71.8,-59.1,79.6,-45.8C87.4,-32.6,90,-16.3,88.5,-0.9C87,14.6,81.4,29.2,73.1,42.8C64.8,56.4,53.8,69,39.8,76.8C25.8,84.6,8.9,87.6,-7.1,88.2C-23.1,88.8,-38.2,86.9,-51.5,79.8C-64.8,72.7,-76.3,60.4,-83.3,45.8C-90.3,31.2,-92.8,14.3,-91.7,-2.1C-90.6,-18.5,-86,-34.4,-77.8,-47.8C-69.6,-61.2,-57.8,-72.1,-43.8,-79.4C-29.8,-86.7,-14.9,-90.4,0.1,-90.6C15.1,-90.8,30.6,-83.6,44.7,-76.4Z" transform="translate(100 100)" />
                </svg>
            </div>
        </div>
    </div>
    
    <!-- Continue Learning -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold">Continue Learning</h3>
            <a href="/student/courses" class="text-sm font-semibold hover:underline" style="color: var(--primary)">View All Courses →</a>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="card animate-slide-in hover:shadow-2xl transition-all" style="animation-delay: 0.1s">
                <div class="flex gap-4">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=200&h=200&fit=crop" alt="Course" class="w-32 h-32 rounded-lg object-cover flex-shrink-0">
                    <div class="flex-1">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <h4 class="font-bold text-lg">Advanced Laravel Development</h4>
                                <p class="text-sm text-gray-500">Prof. Maria Santos</p>
                            </div>
                            <span class="badge badge-primary">In Progress</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex items-center justify-between text-sm mb-1">
                                <span class="text-gray-600">Progress</span>
                                <span class="font-semibold" style="color: var(--success)">68%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 68%"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span>Module 5 of 8</span>
                            <span>•</span>
                            <span>3 hours left</span>
                        </div>
                        <button class="btn-primary w-full">Continue Learning →</button>
                    </div>
                </div>
            </div>
            
            <div class="card animate-slide-in hover:shadow-2xl transition-all" style="animation-delay: 0.2s">
                <div class="flex gap-4">
                    <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=200&h=200&fit=crop" alt="Course" class="w-32 h-32 rounded-lg object-cover flex-shrink-0">
                    <div class="flex-1">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <h4 class="font-bold text-lg">Web Design Fundamentals</h4>
                                <p class="text-sm text-gray-500">Prof. Juan Dela Cruz</p>
                            </div>
                            <span class="badge badge-primary">In Progress</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex items-center justify-between text-sm mb-1">
                                <span class="text-gray-600">Progress</span>
                                <span class="font-semibold" style="color: var(--success)">45%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 45%"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span>Module 3 of 6</span>
                            <span>•</span>
                            <span>5 hours left</span>
                        </div>
                        <button class="btn-primary w-full">Continue Learning →</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Upcoming Assignments & Deadlines -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2 card animate-slide-in" style="animation-delay: 0.3s">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">Upcoming Assignments</h3>
                <a href="/student/assignments" class="text-sm font-semibold hover:underline" style="color: var(--primary)">View All</a>
            </div>
            <div class="space-y-3">
                <div class="flex items-start gap-4 p-4 rounded-lg border-l-4" style="background: linear-gradient(90deg, rgba(239, 71, 111, 0.1) 0%, transparent 100%); border-color: var(--danger)">
                    <div class="text-center flex-shrink-0">
                        <p class="text-2xl font-bold" style="color: var(--danger)">08</p>
                        <p class="text-xs text-gray-500">JAN</p>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="badge badge-danger">Due Tomorrow</span>
                            <p class="text-sm font-semibold">Laravel Project - Authentication System</p>
                        </div>
                        <p class="text-xs text-gray-600 mb-2">Advanced Laravel Development • Prof. Maria Santos</p>
                        <div class="flex items-center gap-2">
                            <button class="text-xs font-semibold px-4 py-2 rounded-lg hover:bg-white transition-all" style="background: rgba(239, 71, 111, 0.1); color: var(--danger)">View Details</button>
                            <button class="btn-primary text-xs px-4 py-2">Submit Assignment</button>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 rounded-lg border-l-4" style="background: linear-gradient(90deg, rgba(255, 210, 63, 0.1) 0%, transparent 100%); border-color: var(--accent)">
                    <div class="text-center flex-shrink-0">
                        <p class="text-2xl font-bold" style="color: var(--accent)">12</p>
                        <p class="text-xs text-gray-500">JAN</p>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="badge badge-warning">Due in 5 days</span>
                            <p class="text-sm font-semibold">Responsive Web Design Quiz</p>
                        </div>
                        <p class="text-xs text-gray-600 mb-2">Web Design Fundamentals • Prof. Juan Dela Cruz</p>
                        <button class="text-xs font-semibold hover:underline" style="color: var(--accent)">View Details →</button>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 rounded-lg border-l-4" style="background: linear-gradient(90deg, rgba(0, 78, 137, 0.1) 0%, transparent 100%); border-color: var(--secondary)">
                    <div class="text-center flex-shrink-0">
                        <p class="text-2xl font-bold" style="color: var(--secondary)">15</p>
                        <p class="text-xs text-gray-500">JAN</p>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="badge" style="background: var(--secondary); color: white;">Due in 1 week</span>
                            <p class="text-sm font-semibold">JavaScript Final Project</p>
                        </div>
                        <p class="text-xs text-gray-600 mb-2">Introduction to Programming • Prof. Ana Reyes</p>
                        <button class="text-xs font-semibold hover:underline" style="color: var(--secondary)">View Details →</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card animate-slide-in" style="animation-delay: 0.4s">
            <h3 class="text-lg font-bold mb-4">Recent Grades</h3>
            <div class="space-y-4">
                <div class="p-3 bg-green-50 rounded-lg border border-green-200">
                    <div class="flex items-center justify-between mb-2">
                        <p class="text-sm font-semibold">CSS Grid Exercise</p>
                        <span class="text-2xl font-bold" style="color: var(--success)">95</span>
                    </div>
                    <p class="text-xs text-gray-600">Web Design Fundamentals</p>
                    <div class="flex items-center gap-2 mt-2">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-xs text-green-600 font-semibold">Excellent work!</span>
                    </div>
                </div>
                
                <div class="p-3 bg-blue-50 rounded-lg border border-blue-200">
                    <div class="flex items-center justify-between mb-2">
                        <p class="text-sm font-semibold">Laravel Quiz 3</p>
                        <span class="text-2xl font-bold" style="color: var(--secondary)">88</span>
                    </div>
                    <p class="text-xs text-gray-600">Advanced Laravel</p>
                    <p class="text-xs text-blue-600 mt-2">Good job!</p>
                </div>
                
                <div class="p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                    <div class="flex items-center justify-between mb-2">
                        <p class="text-sm font-semibold">HTML Basics Test</p>
                        <span class="text-2xl font-bold" style="color: var(--accent)">78</span>
                    </div>
                    <p class="text-xs text-gray-600">Introduction to Programming</p>
                    <p class="text-xs text-yellow-700 mt-2">Keep practicing!</p>
                </div>
                
                <div class="text-center pt-2">
                    <a href="/student/grades" class="text-sm font-semibold hover:underline" style="color: var(--primary)">View All Grades →</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Study Streak & Achievements -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="card animate-slide-in" style="animation-delay: 0.5s">
            <h3 class="text-lg font-bold mb-4">🔥 Study Streak</h3>
            <div class="text-center mb-6">
                <p class="text-6xl font-bold mb-2" style="color: var(--primary)">7</p>
                <p class="text-gray-600">Days in a row</p>
                <p class="text-sm text-gray-500 mt-2">Your longest streak: 12 days</p>
            </div>
            <div class="grid grid-cols-7 gap-2">
                <div class="text-center">
                    <p class="text-xs text-gray-500 mb-1">M</p>
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: var(--primary)">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 mb-1">T</p>
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: var(--primary)">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 mb-1">W</p>
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: var(--primary)">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 mb-1">T</p>
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: var(--primary)">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 mb-1">F</p>
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: var(--primary)">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 mb-1">S</p>
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: var(--primary)">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 mb-1">S</p>
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center border-2 border-dashed" style="border-color: var(--primary); color: var(--primary)">
                        <span class="text-xs font-bold">?</span>
                    </div>
                </div>
            </div>
            <p class="text-sm text-center mt-4 text-gray-600">Keep going! Study today to maintain your streak 💪</p>
        </div>
        
        <div class="card animate-slide-in" style="animation-delay: 0.6s">
            <h3 class="text-lg font-bold mb-4">Recent Achievements</h3>
            <div class="space-y-3">
                <div class="flex items-center gap-4 p-3 bg-gradient-to-r from-yellow-50 to-transparent rounded-lg">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center text-3xl" style="background: linear-gradient(135deg, var(--accent) 0%, #FFC107 100%);">
                        🏆
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold">First Course Completed!</p>
                        <p class="text-xs text-gray-600">HTML & CSS Fundamentals</p>
                        <p class="text-xs text-gray-400 mt-1">Earned 2 days ago</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-4 p-3 bg-gradient-to-r from-green-50 to-transparent rounded-lg">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center text-3xl" style="background: linear-gradient(135deg, var(--success) 0%, #05B689 100%);">
                        🎯
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold">Perfect Score</p>
                        <p class="text-xs text-gray-600">Scored 100% on CSS Grid Quiz</p>
                        <p class="text-xs text-gray-400 mt-1">Earned 1 week ago</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-4 p-3 bg-gradient-to-r from-orange-50 to-transparent rounded-lg">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center text-3xl" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);">
                        🔥
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold">Week Warrior</p>
                        <p class="text-xs text-gray-600">7-day study streak</p>
                        <p class="text-xs text-gray-400 mt-1">Earned today</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection