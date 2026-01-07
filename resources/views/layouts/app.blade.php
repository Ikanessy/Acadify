<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Acadify- E-Learning Platform')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,500;12..96,600;12..96,700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #FF6B35;
            --primary-dark: #E85A2B;
            --secondary: #004E89;
            --accent: #FFD23F;
            --success: #06D6A0;
            --danger: #EF476F;
            --dark: #1A1A2E;
            --light: #F7F7FF;
            --gray: #6B7280;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DM Sans', sans-serif;
            background: linear-gradient(135deg, #F7F7FF 0%, #EEE8FF 100%);
            color: var(--dark);
            min-height: 100vh;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-weight: 700;
        }
        
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--primary);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }
        
        .btn-secondary {
            background: var(--secondary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-secondary:hover {
            background: #003D6E;
            transform: translateY(-2px);
        }
        
        .card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .sidebar {
            background: linear-gradient(180deg, #1A1A2E 0%, #16213E 100%);
            height: 100vh;
            position: fixed;
            width: 280px;
            left: 0;
            top: 0;
            overflow-y: auto;
            z-index: 100;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-item {
            padding: 0.875rem 1.5rem;
            margin: 0.25rem 1rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: rgba(255, 255, 255, 0.7);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(4px);
        }
        
        .sidebar-item.active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .badge-success {
            background: var(--success);
            color: white;
        }
        
        .badge-warning {
            background: var(--accent);
            color: var(--dark);
        }
        
        .badge-danger {
            background: var(--danger);
            color: white;
        }
        
        .badge-primary {
            background: var(--primary);
            color: white;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slide-in {
            animation: slideIn 0.5s ease forwards;
        }
        
        .progress-bar {
            height: 8px;
            background: #E5E7EB;
            border-radius: 20px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--success) 0%, var(--accent) 100%);
            transition: width 0.5s ease;
        }
        
        .notification-dot {
            width: 8px;
            height: 8px;
            background: var(--danger);
            border-radius: 50%;
            position: absolute;
            top: 0;
            right: 0;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.7;
                transform: scale(1.2);
            }
        }
        
        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                LearnHub
            </h1>
            <p class="text-sm text-gray-400 mt-1">{{ ucfirst(auth()->user()->role ?? 'Guest') }}</p>
        </div>
        
        <nav class="mt-4">
            @yield('sidebar')
        </nav>
        
        <!-- User Profile Section -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-700">
            <div class="flex items-center gap-3" x-data="{ open: false }">
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name ?? 'User' }}&background=FF6B35&color=fff" 
                     alt="Profile" 
                     class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <p class="text-white text-sm font-semibold">{{ auth()->user()->name ?? 'User' }}</p>
                    <p class="text-gray-400 text-xs">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                </div>
                <button @click="open = !open" class="text-gray-400 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                    </svg>
                </button>
                
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition
                     class="absolute bottom-16 left-4 right-4 bg-white rounded-lg shadow-xl p-2 z-50">
                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded">Profile</a>
                    <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded">Settings</a>
                    <hr class="my-1">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 rounded">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>
    
    <!-- Main Content -->
    <main class="ml-280" style="margin-left: 280px;">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm sticky top-0 z-50">
            <div class="px-8 py-4 flex items-center justify-between">
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                    <p class="text-sm text-gray-500 mt-1">@yield('page-description', 'Welcome back!')</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <!-- Search Bar -->
                    <div class="relative" x-data="{ focused: false }">
                        <input type="text" 
                               placeholder="Search..." 
                               @focus="focused = true"
                               @blur="focused = false"
                               class="pl-10 pr-4 py-2 border-2 border-gray-200 rounded-lg focus:border-primary-500 focus:outline-none transition-all w-64"
                               :class="{ 'w-80': focused }">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    
                    <!-- Notifications -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="relative p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="notification-dot"></span>
                        </button>
                        
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition
                             class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl py-2 z-50">
                            <div class="px-4 py-2 border-b">
                                <p class="font-semibold">Notifications</p>
                            </div>
                            <div class="max-h-96 overflow-y-auto">
                                <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                                    <p class="text-sm font-semibold">New assignment posted</p>
                                    <p class="text-xs text-gray-500 mt-1">Introduction to Laravel - Due in 3 days</p>
                                </a>
                                <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                                    <p class="text-sm font-semibold">Grade posted</p>
                                    <p class="text-xs text-gray-500 mt-1">You received 95/100 on Quiz 1</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Page Content -->
        <div class="p-8">
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded animate-slide-in" x-data="{ show: true }" x-show="show">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-green-800 font-medium">{{ session('success') }}</p>
                        </div>
                        <button @click="show = false" class="text-green-500 hover:text-green-700">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            
            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded animate-slide-in" x-data="{ show: true }" x-show="show">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-red-800 font-medium">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false" class="text-red-500 hover:text-red-700">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>
    
    @yield('scripts')
</body>
</html>