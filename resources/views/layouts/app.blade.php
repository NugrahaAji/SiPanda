<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @props(['headerClass' => 'bg-zinc-800'])
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Arsip Himakom') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Flatpickr theme overrides: use project yellow accent -->
        <style>
            .flatpickr-calendar { background: #0f1724 !important; color: #e6eef8 !important; border-color: #374151 !important; }
            .flatpickr-day.today, .flatpickr-day.selected { background: #ffcc00 !important; color: #000 !important; }
            .flatpickr-day:hover { background: rgba(255,204,0,0.15) !important; }
            .flatpickr-weekday { color: #cbd5e1 !important; }
            .flatpickr-months .flatpickr-month .flatpickr-months .flatpickr-current-month { color: #e6eef8 !important; }
            .flatpickr-input[readonly] { cursor: pointer; }
            *{
                font-family: 'Instrument Sans', sans-serif;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-[#0a0a0a]">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="{{ $headerClass }} border-b border-gray-700 shadow">
                    <div class="max-w-[1440px] mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
