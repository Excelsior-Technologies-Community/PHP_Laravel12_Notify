<!DOCTYPE html>
@include('notify::components.notify')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Notify') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b, #111827);
            min-height: 100vh;
        }

        .glass-card {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .page-header {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .content-wrapper {
            padding: 30px;
        }

        <style>.notify {
            z-index: 99999 !important;
        }

        .notify .alert-success {
            background: #16a34a !important;
            color: white !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        }

        .notify .alert-danger {
            background: #dc2626 !important;
            color: white !important;
            border-radius: 12px !important;
        }

        .notify .alert-warning {
            background: #f59e0b !important;
            color: black !important;
        }

        .notify .alert-info {
            background: #2563eb !important;
            color: white !important;
        }

        .welcome-card {
            background: linear-gradient(135deg,
                    rgba(99, 102, 241, 0.2),
                    rgba(168, 85, 247, 0.2));
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 25px;
            color: white;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="text-gray-100">

    <div class="min-h-screen">

        {{-- Navigation --}}
        @include('layouts.navigation')

        {{-- Header --}}
        @isset($header)
            <header class="page-header">
                <div class="max-w-7xl mx-auto py-6 px-6">
                    <div class="text-2xl font-bold text-white">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endisset

        {{-- Main Content --}}
        <main class="content-wrapper">

            <div class="max-w-7xl mx-auto">

                {{-- Welcome Banner --}}
                <div class="welcome-card">
                    <h2 class="text-3xl font-bold mb-2">
                        🚀 Laravel Notify Dashboard
                    </h2>

                    <p class="text-gray-300">
                        Modern Dark UI with Toast Notifications
                    </p>
                </div>

                {{-- Page Content --}}
                <div class="glass-card rounded-2xl p-6">
                    {{ $slot }}
                </div>

            </div>

        </main>

    </div>

    <x-notify::notify />

</body>

</html>