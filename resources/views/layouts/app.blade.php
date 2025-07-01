<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aplikasi Kasir') }}</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

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

<body class="font-sans antialiased">
        <div class="min-h-screen gradient-bg relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute top-10 left-10 w-20 h-20 bg-white/20 rounded-full floating-animation"></div>
            <div class="absolute top-32 right-16 w-16 h-16 bg-pink-300/30 rounded-full floating-animation" style="animation-delay: -2s;"></div>
            <div class="absolute bottom-20 left-20 w-24 h-24 bg-rose-200/20 rounded-full floating-animation" style="animation-delay: -4s;"></div>
            <div class="absolute bottom-32 right-10 w-12 h-12 bg-white/25 rounded-full floating-animation" style="animation-delay: -1s;"></div>
        @include('layouts.navigation')

        <!-- Page Heading -->
    @isset($header)
        <header class="bg-gradient-to-r from-pink-50 to-rose-50 shadow-sm border-b border-pink-100">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1>
                    {{ $header }}
                </h1>
            </div>
        </header>
    @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</body>

</html>