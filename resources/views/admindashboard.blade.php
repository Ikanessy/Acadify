@extends('layouts.app')

@section('title', 'Acadify')

@section('page-title', 'Admin Dashboard')
@section('page-description', 'Manage your e-learning platform')

@section('sidebar')
    <a href="/admin/dashboard" class="sidebar-item active">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        Dashboard
    </a>
    
    <a href="/admin/courses" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        Courses
    </a>
    
    <a href="/admin/students" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
        </svg>
        Students
    </a>
    
    <a href="/admin/teachers" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        Teachers
    </a>
    
    <a href="/admin/analytics" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
        </svg>
        Analytics
    </a>
    
    <a href="/admin/settings" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        Settings
    </a>
@endsection

@section('content')
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="card animate-slide-in" style="animation-delay: 0.1s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Students</p>
                    <h3 class="text-3xl font-bold mt-2" style="color: var(--secondary)">3</h3>
                    <p class="text-sm text-green-600 mt-2">↑ 0.3 from last month</p>
                </div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #004E89 0%, #003D6E 100%);">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="card animate-slide-in" style="animation-delay: 0.2s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Active Courses</p>
                    <h3 class="text-3xl font-bold mt-2" style="color: var(--primary)">2</h3>
                    <p class="text-sm text-green-600 mt-2">↑ 2 new courses</p>
                </div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #FF6B35 0%, #E85A2B 100%);">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="card animate-slide-in" style="animation-delay: 0.3s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Teachers</p>
                    <h3 class="text-3xl font-bold mt-2" style="color: var(--accent)">4</h3>
                    <p class="text-sm text-gray-600 mt-2">→ No change</p>
                </div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #FFD23F 0%, #FFC107 100%);">
                    <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="card animate-slide-in" style="animation-delay: 0.4s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Completion Rate</p>
                    <h3 class="text-3xl font-bold mt-2" style="color: var(--success)">87%</h3>
                    <p class="text-sm text-green-600 mt-2">↑ 5% improvement</p>
                </div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #06D6A0 0%, #05B689 100%);">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="card animate-slide-in" style="animation-delay: 0.5s">
            <h3 class="text-lg font-bold mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <button class="w-full btn-primary flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create New Course
                </button>
                <button class="w-full btn-secondary flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    Add New Student
                </button>
                <button class="w-full bg-white border-2 border-gray-200 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:border-gray-300 transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Invite Teacher
                </button>
            </div>
        </div>
        
        <div class="lg:col-span-2 card animate-slide-in" style="animation-delay: 0.6s">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">Recent Activity</h3>
                <a href="#" class="text-sm font-semibold hover:underline" style="color: var(--primary)">View All</a>
            </div>
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0" style="background: var(--success)">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold">New course published</p>
                        <p class="text-xs text-gray-500 mt-1">"Advanced Laravel Development" by Prof. Maria Santos</p>
                        <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0" style="background: var(--secondary)">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold"> 0 new student registrations</p>
                        <p class="text-xs text-gray-500 mt-1">Students enrolled in various courses</p>
                        <p class="text-xs text-gray-400 mt-1">5 hours ago</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0" style="background: var(--accent)">
                        <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Assignment submitted</p>
                        <p class="text-xs text-gray-500 mt-1">3 submissions for "Web Development Quiz"</p>
                        <p class="text-xs text-gray-400 mt-1">1 day ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Courses and Pending Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="card animate-slide-in" style="animation-delay: 0.7s">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">Recent Courses</h3>
                <a href="/admin/courses" class="text-sm font-semibold hover:underline" style="color: var(--primary)">View All</a>
            </div>
            <div class="space-y-3">
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=100&h=100&fit=crop" alt="Course" class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <h4 class="font-semibold text-sm">Advanced Laravel Development</h4>
                        <p class="text-xs text-gray-500 mt-1">Prof. Maria Santos • 2 students</p>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="badge badge-success">Active</span>
                            <span class="text-xs text-gray-500">Updated 2 days ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=100&h=100&fit=crop" alt="Course" class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <h4 class="font-semibold text-sm">Web Design Fundamentals</h4>
                        <p class="text-xs text-gray-500 mt-1">Prof. Juan Dela Cruz • 2 students</p>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="badge badge-success">Active</span>
                            <span class="text-xs text-gray-500">Updated 1 week ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=100&h=100&fit=crop" alt="Course" class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <h4 class="font-semibold text-sm">Introduction to Programming</h4>
                        <p class="text-xs text-gray-500 mt-1">Prof. Ana Reyes • 2 students</p>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="badge badge-warning">Draft</span>
                            <span class="text-xs text-gray-500">Created yesterday</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card animate-slide-in" style="animation-delay: 0.8s">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">Pending Actions</h3>
                <span class="badge badge-danger">8 Items</span>
            </div>
            <div class="space-y-3">
                <div class="flex items-start gap-3 p-3 border-l-4 rounded bg-red-50" style="border-color: var(--danger)">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color: var(--danger)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Course approval needed</p>
                        <p class="text-xs text-gray-600 mt-1">3 courses waiting for review</p>
                    </div>
                    <button class="text-sm font-semibold hover:underline" style="color: var(--danger)">Review</button>
                </div>
                
                <div class="flex items-start gap-3 p-3 border-l-4 rounded bg-yellow-50" style="border-color: var(--accent)">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color: var(--accent)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Teacher applications</p>
                        <p class="text-xs text-gray-600 mt-1">5 new applications to review</p>
                    </div>
                    <button class="text-sm font-semibold hover:underline" style="color: var(--accent)">View</button>
                </div>
                
                <div class="flex items-start gap-3 p-3 border-l-4 rounded bg-blue-50" style="border-color: var(--secondary)">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color: var(--secondary)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Student support tickets</p>
                        <p class="text-xs text-gray-600 mt-1">12 open tickets</p>
                    </div>
                    <button class="text-sm font-semibold hover:underline" style="color: var(--secondary)">Handle</button>
                </div>
            </div>
        </div>
    </div>
@endsection