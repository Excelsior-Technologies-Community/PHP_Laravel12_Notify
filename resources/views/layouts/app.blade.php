<!DOCTYPE html>
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
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }

        .page-header {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .content-wrapper {
            padding: 30px;
        }

        .notify {
            z-index: 99999 !important;
        }

        .notify [class*="border-green-500"] {
            background: #16a34a !important;
            color: white !important;
        }

        .notify [class*="border-red-500"] {
            background: #dc2626 !important;
            color: white !important;
        }

        .notify [class*="border-yellow-500"] {
            background: #f59e0b !important;
            color: black !important;
        }

        .notify [class*="border-blue-500"] {
            background: #2563eb !important;
            color: white !important;
        }

        .notify [class*="border-green-500"] svg,
        .notify [class*="border-red-500"] svg,
        .notify [class*="border-yellow-500"] svg,
        .notify [class*="border-blue-500"] svg {
            color: white !important;
        }

        .notify [class*="border-yellow-500"] svg {
            color: black !important;
        }

        .welcome-card {
            background: linear-gradient(135deg, rgba(99,102,241,0.2), rgba(168,85,247,0.2));
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            color: white;
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
                <h2 class="text-2xl font-bold text-white">
                    {{ $header }}
                </h2>
            </div>
        </header>
        @endisset

        {{-- Main Content --}}
        <main class="content-wrapper">
            <div class="max-w-7xl mx-auto">

                {{-- Welcome --}}
                <div class="welcome-card">
                    <h2 class="text-3xl font-bold">🚀 Laravel Notify Dashboard</h2>
                    <p>Modern UI with Toast Notifications</p>
                </div>

                {{-- Page Content --}}
                <div class="glass-card rounded-2xl p-6">
                    {{ $slot }}
                </div>

            </div>
        </main>

    </div>

    {{-- IMPORTANT LINE --}}
    <x-notify::notify />

</body>
</html>