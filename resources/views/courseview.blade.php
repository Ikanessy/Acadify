@extends('layouts.app')

@section('title', 'Course: Advanced Laravel Development - LearnHub')

@section('page-title', 'Advanced Laravel Development')
@section('page-description', 'Master Laravel framework with hands-on projects')

@section('sidebar')
    <a href="/student/dashboard" class="sidebar-item">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        Dashboard
    </a>
    
    <a href="/student/courses" class="sidebar-item active">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        My Courses
    </a>
@endsection

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content Area - Video Player & Content -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Video Player -->
        <div class="card p-0 overflow-hidden animate-slide-in">
            <div class="relative bg-black" style="padding-top: 56.25%;">
                <div class="absolute inset-0 flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.8) 0%, rgba(232, 90, 43, 0.8) 100%);">
                    <div class="text-center text-white">
                        <svg class="w-20 h-20 mx-auto mb-4 cursor-pointer hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/>
                        </svg>
                        <p class="text-xl font-bold">Module 5: Authentication & Authorization</p>
                        <p class="text-sm opacity-75 mt-2">Duration: 45 minutes</p>
                    </div>
                </div>
            </div>
            
            <!-- Video Controls -->
            <div class="p-4 bg-gray-50 border-t">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-4">
                        <button class="text-gray-700 hover:text-primary transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/>
                            </svg>
                        </button>
                        <span class="text-sm font-semibold">00:00 / 45:23</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="text-gray-700 hover:text-primary transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </button>
                        <button class="text-gray-700 hover:text-primary transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full rounded-full" style="background: var(--primary); width: 35%"></div>
                </div>
            </div>
        </div>
        
        <!-- Lesson Info & Tabs -->
        <div class="card animate-slide-in" style="animation-delay: 0.1s">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Authentication & Authorization in Laravel</h2>
                    <div class="flex items-center gap-4 text-sm text-gray-600">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            45 minutes
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            1,247 views
                        </div>
                    </div>
                </div>
                <button class="btn-primary flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Mark Complete
                </button>
            </div>
            
            <!-- Tabs -->
            <div x-data="{ tab: 'overview' }" class="mt-6">
                <div class="border-b border-gray-200">
                    <nav class="flex gap-6">
                        <button @click="tab = 'overview'" 
                                :class="tab === 'overview' ? 'border-primary text-primary' : 'border-transparent text-gray-600'"
                                class="pb-3 border-b-2 font-semibold transition-colors">
                            Overview
                        </button>
                        <button @click="tab = 'notes'" 
                                :class="tab === 'notes' ? 'border-primary text-primary' : 'border-transparent text-gray-600'"
                                class="pb-3 border-b-2 font-semibold transition-colors">
                            Notes
                        </button>
                        <button @click="tab = 'resources'" 
                                :class="tab === 'resources' ? 'border-primary text-primary' : 'border-transparent text-gray-600'"
                                class="pb-3 border-b-2 font-semibold transition-colors">
                            Resources
                        </button>
                        <button @click="tab = 'qa'" 
                                :class="tab === 'qa' ? 'border-primary text-primary' : 'border-transparent text-gray-600'"
                                class="pb-3 border-b-2 font-semibold transition-colors">
                            Q&A
                        </button>
                    </nav>
                </div>
                
                <!-- Tab Content -->
                <div class="mt-6">
                    <div x-show="tab === 'overview'" class="space-y-4">
                        <div>
                            <h3 class="font-bold mb-2">What you'll learn</h3>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color: var(--success)" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Implement Laravel's built-in authentication system</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color: var(--success)" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Create custom middleware for authorization</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color: var(--success)" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Understand role-based access control (RBAC)</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color: var(--success)" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Secure your application with best practices</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div>
                            <h3 class="font-bold mb-2">Description</h3>
                            <p class="text-gray-700 leading-relaxed">
                                In this comprehensive module, you'll dive deep into Laravel's powerful authentication and authorization systems. 
                                We'll start with the basics of user authentication, then move on to more advanced topics like custom guards, 
                                policies, and gates. By the end of this lesson, you'll be able to build secure, role-based applications with confidence.
                            </p>
                        </div>
                    </div>
                    
                    <div x-show="tab === 'notes'">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <p class="text-gray-600">Take notes while you learn</p>
                                <button class="btn-primary text-sm px-4 py-2">Add Note</button>
                            </div>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                <p>No notes yet. Start taking notes!</p>
                            </div>
                        </div>
                    </div>
                    
                    <div x-show="tab === 'resources'">
                        <div class="space-y-3">
                            <a href="#" class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: var(--primary)">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold">Authentication_Guide.pdf</p>
                                    <p class="text-sm text-gray-500">2.4 MB • PDF Document</p>
                                </div>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                            </a>
                            
                            <a href="#" class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: var(--secondary)">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold">sample-code.zip</p>
                                    <p class="text-sm text-gray-500">856 KB • Source Code</p>
                                </div>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <div x-show="tab === 'qa'">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-gray-600">Ask questions and get answers</p>
                                <button class="btn-primary text-sm px-4 py-2">Ask Question</button>
                            </div>
                            
                            <div class="border rounded-lg p-4">
                                <div class="flex items-start gap-3 mb-3">
                                    <img src="https://ui-avatars.com/api/?name=Juan+Silva&background=FF6B35&color=fff" alt="User" class="w-10 h-10 rounded-full">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <p class="font-semibold text-sm">Juan Silva</p>
                                            <span class="text-xs text-gray-500">2 days ago</span>
                                        </div>
                                        <p class="text-gray-700 mt-2">How do I implement custom guards in Laravel 11?</p>
                                        <div class="flex items-center gap-4 mt-3 text-sm text-gray-500">
                                            <button class="hover:text-primary">👍 5</button>
                                            <button class="hover:text-primary">💬 3 replies</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sidebar - Course Navigation -->
    <div class="space-y-6">
        <!-- Course Progress -->
        <div class="card animate-slide-in" style="animation-delay: 0.2s">
            <h3 class="font-bold mb-4">Your Progress</h3>
            <div class="text-center mb-4">
                <div class="relative inline-flex items-center justify-center">
                    <svg class="w-32 h-32 transform -rotate-90">
                        <circle cx="64" cy="64" r="56" stroke="#E5E7EB" stroke-width="8" fill="none"/>
                        <circle cx="64" cy="64" r="56" stroke="url(#progress-gradient)" stroke-width="8" fill="none" 
                                stroke-dasharray="351.86" stroke-dashoffset="108.08" stroke-linecap="round"/>
                        <defs>
                            <linearGradient id="progress-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" style="stop-color: var(--success)"/>
                                <stop offset="100%" style="stop-color: var(--accent)"/>
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <p class="text-3xl font-bold" style="color: var(--primary)">68%</p>
                            <p class="text-xs text-gray-500">Complete</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Completed Lessons</span>
                    <span class="font-semibold">27 / 40</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Time Spent</span>
                    <span class="font-semibold">18.5 hours</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Avg. Quiz Score</span>
                    <span class="font-semibold">88%</span>
                </div>
            </div>
        </div>
        
        <!-- Course Curriculum -->
        <div class="card animate-slide-in" style="animation-delay: 0.3s">
            <h3 class="font-bold mb-4">Course Content</h3>
            <div class="space-y-2" x-data="{ open: 5 }">
                <!-- Module 1 -->
                <div class="border rounded-lg">
                    <button @click="open = open === 1 ? null : 1" class="w-full flex items-center justify-between p-3 text-left hover:bg-gray-50">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 transform transition-transform" :class="{ 'rotate-90': open === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <div>
                                <p class="font-semibold text-sm">Module 1: Introduction</p>
                                <p class="text-xs text-gray-500">5 lessons • 2 hours</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div x-show="open === 1" x-transition class="border-t">
                        <a href="#" class="flex items-center gap-3 p-3 text-sm hover:bg-gray-50">
                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="flex-1">Welcome to Laravel</span>
                            <span class="text-xs text-gray-500">12:30</span>
                        </a>
                    </div>
                </div>
                
                <!-- Module 5 - Current -->
                <div class="border rounded-lg" style="border-color: var(--primary)">
                    <button @click="open = open === 5 ? null : 5" class="w-full flex items-center justify-between p-3 text-left" style="background: rgba(255, 107, 53, 0.05)">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 transform transition-transform" :class="{ 'rotate-90': open === 5 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <div>
                                <p class="font-semibold text-sm">Module 5: Authentication</p>
                                <p class="text-xs text-gray-500">6 lessons • 3 hours</p>
                            </div>
                        </div>
                        <span class="badge badge-primary">Current</span>
                    </button>
                    <div x-show="open === 5" x-transition class="border-t">
                        <a href="#" class="flex items-center gap-3 p-3 text-sm" style="background: rgba(255, 107, 53, 0.1)">
                            <svg class="w-4 h-4" style="color: var(--primary)" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/>
                            </svg>
                            <span class="flex-1 font-semibold" style="color: var(--primary)">Authentication & Authorization</span>
                            <span class="text-xs text-gray-500">45:23</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 text-sm hover:bg-gray-50">
                            <div class="w-4 h-4 rounded-full border-2 border-gray-300"></div>
                            <span class="flex-1">Custom Guards</span>
                            <span class="text-xs text-gray-500">32:15</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection