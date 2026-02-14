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
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <main class="min-h-screen flex items-center justify-center">
            <div class="max-w-5xl w-full px-6">
                <div class="flex gap-20">

                    <!-- Form -->
                    <div class="w-full max-w-md">
                        <div class="text-center mb-6">
                            <a href="/">
                                <img src="/img/logoipsum-265.svg" alt="" class="mx-auto h-10" />
                            </a>
                        </div>

                        <h1 class="text-2xl font-semibold mb-6">
                            Signup
                        </h1>

                        {{ $slot }}

                    </div>

                    <!-- Image -->
                    <div class="hidden lg:block">
                        <img
                            src="/img/car-png-39071.png"
                            alt=""
                            class="max-w-md w-full object-contain"
                        />
                    </div>

                </div>
            </div>
        </main>

    </body>
</html>
