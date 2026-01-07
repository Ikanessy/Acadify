<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - LearnHub</title>
    
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
        
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .auth-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            max-width: 1100px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        
        @media (max-width: 768px) {
            .auth-card {
                grid-template-columns: 1fr;
            }
            .auth-visual {
                display: none;
            }
        }
        
        .auth-visual {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .auth-visual::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 8s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(-20px, 20px) rotate(5deg); }
        }
        
        .auth-form {
            padding: 3rem;
        }
        
        .input-group {
            margin-bottom: 1.5rem;
        }
        
        .input-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }
        
        .input-group input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .input-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }
        
        .btn-primary {
            width: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 2rem 0;
            color: #9CA3AF;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #E5E7EB;
        }
        
        .divider span {
            padding: 0 1rem;
            font-size: 0.875rem;
        }
        
        .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .social-btn {
            padding: 0.875rem;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-weight: 600;
        }
        
        .social-btn:hover {
            border-color: var(--primary);
            background: rgba(255, 107, 53, 0.05);
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
            animation: slideIn 0.6s ease forwards;
        }
        
        .feature-item {
            display: flex;
            align-items: start;
            gap: 1rem;
            color: white;
            margin-bottom: 1.5rem;
        }
        
        .feature-icon {
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card animate-slide-in">
            <!-- Visual Side -->
            <div class="auth-visual">
                <div style="position: relative; z-index: 1;">
                    <div class="flex items-center gap-3 mb-8">
                        <svg class="w-12 h-12 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h1 class="text-3xl font-bold text-white">LearnHub</h1>
                    </div>
                    
                    <h2 class="text-3xl font-bold text-white mb-4">
                        Welcome to your learning journey!
                    </h2>
                    <p class="text-white opacity-90 mb-8 text-lg">
                        Access thousands of courses, learn at your own pace, and achieve your goals with LearnHub.
                    </p>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-1">Expert-Led Courses</h3>
                            <p class="opacity-90">Learn from industry professionals</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-1">Track Progress</h3>
                            <p class="opacity-90">Monitor your learning achievements</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-1">Earn Certificates</h3>
                            <p class="opacity-90">Validate your new skills</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form Side -->
            <div class="auth-form">
                <h2 class="text-3xl font-bold mb-2">Sign In</h2>
                <p class="text-gray-600 mb-8">Enter your credentials to access your account</p>
                
                @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                        <p class="text-red-800 text-sm">{{ session('error') }}</p>
                    </div>
                @endif
                
                <form method="POST" action="/login">
                    @csrf
                    
                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               placeholder="you@example.com" 
                               value="{{ old('email') }}"
                               required>
                    </div>
                    
                    <div class="input-group">
                        <div class="flex items-center justify-between mb-2">
                            <label for="password">Password</label>
                            <a href="/forgot-password" class="text-sm font-semibold hover:underline" style="color: var(--primary)">
                                Forgot password?
                            </a>
                        </div>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="••••••••" 
                               required>
                    </div>
                    
                    <div class="flex items-center mb-6">
                        <input type="checkbox" 
                               id="remember" 
                               name="remember" 
                               class="w-4 h-4 rounded border-gray-300 cursor-pointer"
                               style="accent-color: var(--primary)">
                        <label for="remember" class="ml-2 text-sm text-gray-600 cursor-pointer">
                            Remember me for 30 days
                        </label>
                    </div>
                    
                    <button type="submit" class="btn-primary">
                        Sign In
                    </button>
                </form>
                
                <div class="divider">
                    <span>Or continue with</span>
                </div>
                
                <div class="social-login">
                    <button class="social-btn">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Google
                    </button>
                    <button class="social-btn">
                        <svg class="w-5 h-5" fill="#1877F2" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </button>
                </div>
                
                <p class="text-center text-sm text-gray-600 mt-8">
                    Don't have an account? 
                    <a href="/register" class="font-semibold hover:underline" style="color: var(--primary)">Sign up for free</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>