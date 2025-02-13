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

        @livewireStyles
        @stack('styles')

    </head>
    <body class="bg-gray-100">

        <div class="flex">
            <!-- Sidebar -->
            @include('layouts.navigation')
    
            <!-- Contenido Principal -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
        @stack('scripts')

    </body>
</html>
