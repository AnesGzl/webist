@props(['css'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="shortcut icon" href="/logo.png">
    <title>wibist:{{$css}}</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/'.$css.'.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/theme.js'])

    <!-- Dark mode script -->
    <script>
        // Pour éviter le flash du mauvais thème
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    @livewireStyles
</head>
<body class="h-full bg-gray-50 dark:bg-gray-900 transition-colors duration-200">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-800 border-r dark:border-gray-700 fixed h-full shadow-lg transition-colors duration-200">
            <div class="flex items-center justify-center p-4 border-b dark:border-gray-700">
                <img src="/logo.png" alt="Logo" class="h-8">
            </div>

            <nav class="p-4 space-y-2">
                @include('components.sidebar-menu')
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <!-- Header -->
            <header class="bg-white dark:bg-gray-800 border-b dark:border-gray-700 h-16 fixed w-full z-20 transition-colors duration-200">
                @include('components.header')
            </header>

            <!-- Main Content Area -->
            <main class="pt-16 p-6">
                <!-- Flash Messages -->
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 dark:bg-green-900/20 dark:text-green-300">
                            <div class="flex items-center">
                                <div class="py-1">
                                    <svg class="w-6 h-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>{{ session('success') }}</div>
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 dark:bg-red-900/20 dark:text-red-300">
                                <div class="flex items-center">
                                    <div class="py-1">
                                        <svg class="w-6 h-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>{{ $error }}</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
</body>
</html>
