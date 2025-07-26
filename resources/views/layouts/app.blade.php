<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Workspace Manager') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @hasSection('header')
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @if (session('status'))
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-transition 
                    class="mb-4 px-4 py-2 bg-green-500 text-white rounded shadow"
                >
                    <div class="flex justify-between items-center">
                        <span class="text-lg">{{ session('status') }}</span>
                        <button @click="show = false" class="ml-4 text-sm font-bold">✕</button>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>

