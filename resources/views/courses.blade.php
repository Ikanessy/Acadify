@extends('layouts.app')

@section('title', 'Course Management - Admin')

@section('page-title', 'Course Management')
@section('page-description', 'Create and manage all courses')

@section('sidebar')
    <a href="/admin/dashboard" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        Dashboard
    </a>
    
    <a href="/admin/courses" class="sidebar-item active">
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
@endsection

@section('content')
    <!-- Actions Bar -->
    <div class="flex items-center justify-between mb-6">
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center gap-2 px-4 py-2 bg-white border-2 border-gray-200 rounded-lg hover:border-gray-300 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                <span class="font-semibold">Filter</span>
            </button>
            
            <div x-show="open" 
                 @click.away="open = false"
                 x-transition
                 class="absolute top-full left-0 mt-2 w-64 bg-white rounded-lg shadow-xl p-4 z-50">
                <p class="font-semibold mb-3">Filter by Status</p>
                <label class="flex items-center gap-2 mb-2 cursor-pointer">
                    <input type="checkbox" class="rounded" style="accent-color: var(--primary)">
                    <span class="text-sm">Active Courses</span>
                </label>
                <label class="flex items-center gap-2 mb-2 cursor-pointer">
                    <input type="checkbox" class="rounded" style="accent-color: var(--primary)">
                    <span class="text-sm">Draft Courses</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" class="rounded" style="accent-color: var(--primary)">
                    <span class="text-sm">Archived</span>
                </label>
            </div>
        </div>
        
        <button class="btn-primary flex items-center gap-2" onclick="window.location.href='/admin/courses/create'">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Create New Course
        </button>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="card animate-slide-in" style="animation-delay: 0.1s">
            <p class="text-gray-500 text-sm font-medium mb-2">Total Courses</p>
            <h3 class="text-3xl font-bold" style="color: var(--primary)">48</h3>
        </div>
        <div class="card animate-slide-in" style="animation-delay: 0.2s">
            <p class="text-gray-500 text-sm font-medium mb-2">Active</p>
            <h3 class="text-3xl font-bold" style="color: var(--success)">42</h3>
        </div>
        <div class="card animate-slide-in" style="animation-delay: 0.3s">
            <p class="text-gray-500 text-sm font-medium mb-2">Draft</p>
            <h3 class="text-3xl font-bold" style="color: var(--accent)">6</h3>
        </div>
        <div class="card animate-slide-in" style="animation-delay: 0.4s">
            <p class="text-gray-500 text-sm font-medium mb-2">Total Students</p>
            <h3 class="text-3xl font-bold" style="color: var(--secondary)">1,284</h3>
        </div>
    </div>
    
    <!-- Courses Table -->
    <div class="card animate-slide-in" style="animation-delay: 0.5s">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Course</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Teacher</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Students</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Progress</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Status</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-4">
                                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=80&h=80&fit=crop" 
                                     alt="Course" 
                                     class="w-16 h-16 rounded-lg object-cover">
                                <div>
                                    <p class="font-semibold">Advanced Laravel Development</p>
                                    <p class="text-sm text-gray-500">Updated 2 days ago</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2">
                                <img src="https://ui-avatars.com/api/?name=Maria+Santos&background=FF6B35&color=fff" 
                                     alt="Teacher" 
                                     class="w-8 h-8 rounded-full">
                                <span class="text-sm font-medium">Prof. Maria Santos</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <span class="font-semibold">245</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2">
                                <div class="progress-bar w-24">
                                    <div class="progress-fill" style="width: 87%"></div>
                                </div>
                                <span class="text-sm font-semibold">87%</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <span class="badge badge-success">Active</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2" x-data="{ open: false }">
                                <button @click="open = !open" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                    </svg>
                                </button>
                                
                                <div x-show="open" 
                                     @click.away="open = false"
                                     x-transition
                                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-50">
                                    <a href="/admin/courses/1/edit" class="block px-4 py-2 text-sm hover:bg-gray-100">Edit Course</a>
                                    <a href="/admin/courses/1" class="block px-4 py-2 text-sm hover:bg-gray-100">View Details</a>
                                    <a href="/admin/courses/1/students" class="block px-4 py-2 text-sm hover:bg-gray-100">Manage Students</a>
                                    <hr class="my-1">
                                    <button class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Archive Course</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-4">
                                <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=80&h=80&fit=crop" 
                                     alt="Course" 
                                     class="w-16 h-16 rounded-lg object-cover">
                                <div>
                                    <p class="font-semibold">Web Design Fundamentals</p>
                                    <p class="text-sm text-gray-500">Updated 1 week ago</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2">
                                <img src="https://ui-avatars.com/api/?name=Juan+Cruz&background=004E89&color=fff" 
                                     alt="Teacher" 
                                     class="w-8 h-8 rounded-full">
                                <span class="text-sm font-medium">Prof. Juan Dela Cruz</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <span class="font-semibold">189</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2">
                                <div class="progress-bar w-24">
                                    <div class="progress-fill" style="width: 75%"></div>
                                </div>
                                <span class="text-sm font-semibold">75%</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <span class="badge badge-success">Active</span>
                        </td>
                        <td class="py-4 px-4">
                            <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-4">
                                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=80&h=80&fit=crop" 
                                     alt="Course" 
                                     class="w-16 h-16 rounded-lg object-cover">
                                <div>
                                    <p class="font-semibold">Introduction to Programming</p>
                                    <p class="text-sm text-gray-500">Created yesterday</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2">
                                <img src="https://ui-avatars.com/api/?name=Ana+Reyes&background=06D6A0&color=fff" 
                                     alt="Teacher" 
                                     class="w-8 h-8 rounded-full">
                                <span class="text-sm font-medium">Prof. Ana Reyes</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <span class="font-semibold text-gray-400">0</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2">
                                <div class="progress-bar w-24">
                                    <div class="progress-fill" style="width: 45%"></div>
                                </div>
                                <span class="text-sm font-semibold">45%</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <span class="badge badge-warning">Draft</span>
                        </td>
                        <td class="py-4 px-4">
                            <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-4">
                                <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?w=80&h=80&fit=crop" 
                                     alt="Course" 
                                     class="w-16 h-16 rounded-lg object-cover">
                                <div>
                                    <p class="font-semibold">Database Design & SQL</p>
                                    <p class="text-sm text-gray-500">Updated 3 days ago</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2">
                                <img src="https://ui-avatars.com/api/?name=Carlos+Reyes&background=FFD23F&color=000" 
                                     alt="Teacher" 
                                     class="w-8 h-8 rounded-full">
                                <span class="text-sm font-medium">Prof. Carlos Reyes</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <span class="font-semibold">312</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2">
                                <div class="progress-bar w-24">
                                    <div class="progress-fill" style="width: 92%"></div>
                                </div>
                                <span class="text-sm font-semibold">92%</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <span class="badge badge-success">Active</span>
                        </td>
                        <td class="py-4 px-4">
                            <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="flex items-center justify-between mt-6 pt-6 border-t">
            <p class="text-sm text-gray-600">Showing 1-4 of 48 courses</p>
            <div class="flex items-center gap-2">
                <button class="px-4 py-2 border-2 border-gray-200 rounded-lg hover:border-gray-300 transition-all disabled:opacity-50" disabled>
                    Previous
                </button>
                <button class="px-4 py-2 rounded-lg font-semibold text-white" style="background: var(--primary)">1</button>
                <button class="px-4 py-2 border-2 border-gray-200 rounded-lg hover:border-gray-300 transition-all">2</button>
                <button class="px-4 py-2 border-2 border-gray-200 rounded-lg hover:border-gray-300 transition-all">3</button>
                <button class="px-4 py-2 border-2 border-gray-200 rounded-lg hover:border-gray-300 transition-all">
                    Next
                </button>
            </div>
        </div>
    </div>
@endsection