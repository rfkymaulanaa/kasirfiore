<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .gradient-bg {
                background: linear-gradient(135deg, #ec4899 0%, #f472b6 25%, #f9a8d4 50%, #fcd2e9 100%);
            }
            
            .glass-effect {
                backdrop-filter: blur(20px);
                background: rgba(255, 255, 255, 0.85);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .floating-animation {
                animation: float 6s ease-in-out infinite;
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }

            .shimmer {
                background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.5) 50%, transparent 70%);
                background-size: 200% 200%;
                animation: shimmer 3s infinite;
            }
            
            @keyframes shimmer {
                0% { background-position: -200% -200%; }
                100% { background-position: 200% 200%; }
            }
        </style>
</head>

<body class="font-sans text-gray-900 antialiased">
        <!-- Background dengan gradient pink -->
        <div class="min-h-screen gradient-bg relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute top-10 left-10 w-20 h-20 bg-white/20 rounded-full floating-animation"></div>
            <div class="absolute top-32 right-16 w-16 h-16 bg-pink-300/30 rounded-full floating-animation" style="animation-delay: -2s;"></div>
            <div class="absolute bottom-20 left-20 w-24 h-24 bg-rose-200/20 rounded-full floating-animation" style="animation-delay: -4s;"></div>
            <div class="absolute bottom-32 right-10 w-12 h-12 bg-white/25 rounded-full floating-animation" style="animation-delay: -1s;"></div>
            
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
                <div class="mb-8 pulse-shadow rounded-full p-4 bg-white/20 backdrop-blur-sm">
                    <a href="/">
                        @if(file_exists(public_path('assets/logo.png')))
                            <img src="{{ asset('assets/logo.png') }}" alt="logo"
                                class="block h-20 w-20 rounded-full object-cover shadow-lg" />
                        @else
                            <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-rose-600 rounded-full flex items-center justify-center text-white text-lg font-bold shadow-lg">
                                {{ substr(config('app.name', 'L'), 0, 1) }}
                            </div>
                        @endif
                    </a>
                </div>
                <h2 class="text-center text-xl font-bold text-gray-700 ">
                @if (request()->is('login'))
                @elseif (request()->is('register'))
                @else
                @endif
                </h2>
                <!-- Auth Card -->
                <div class="w-full sm:max-w-md relative">
                    <!-- Card dengan glass effect -->
                    <div class="glass-effect shadow-2xl rounded-2xl p-8 relative overflow-hidden">
                        <!-- Shimmer effect overlay -->
                        <div class="absolute inset-0 shimmer rounded-2xl pointer-events-none"></div>
                        
                        <!-- Content dari slot Laravel -->
                        <div class="relative z-10">
                            {{ $slot }}
                        </div>
                    </div>
                    
                    <!-- Bottom glow effect -->
                    <div class="absolute inset-x-0 -bottom-2 h-4 bg-gradient-to-r from-transparent via-pink-500/20 to-transparent blur-lg"></div>
                </div>
            </div>
        </div>
</body>

</html>
