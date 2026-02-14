<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Autosales</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 ">
            <div class=" w-full flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="col-span-2 lg:col-span-3">
                        <div class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">
                            @if (Route::has('login'))
                            <x-navbar />
                        @endif

                        </div>
                    </header>

                    <!-- Hero Slider -->
                    <section
                        x-data="{ slide: 1 }"
                        class="relative py-20 overflow-hidden w-full"
                    >
                        <div class="relative h-[500px]">
                            <!-- SLIDE 1 -->
                            <div
                                x-show="slide === 1"
                                x-transition:enter="transition ease-out duration-500 transform"
                                x-transition:enter-start="translate-x-full"
                                x-transition:enter-end="translate-x-0"
                                x-transition:leave="transition ease-in duration-500 transform"
                                x-transition:leave-start="translate-x-0"
                                x-transition:leave-end="-translate-x-full"
                                class="absolute inset-0 w-full"
                            >
                                <div class="max-w-[1400px] mx-auto px-12 grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
                                    <!-- Text -->
                                    <div class="max-w-2xl">
                                        <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                                            Buy <span class="text-red-500">the Best Cars</span><br>
                                            from us.
                                        </h1>
                                        <p class="mt-6 text-gray-600 text-lg max-w-xl">
                                            Quality cars, exceptional prices,
                                            and a hassle-free experience. What more could you ask for?
                                        </p>
                                        <button class="mt-8 px-8 py-4 bg-red-500 text-white rounded-md hover:bg-red-600 text-lg font-medium">
                                            Order Your Car
                                        </button>
                                    </div>
                                    <!-- Image -->
                                    <div class="flex justify-center lg:justify-end">
                                        <img src="/img/car-png-39071.png" class="max-w-full h-auto">
                                    </div>
                                </div>
                            </div>

                            <!-- SLIDE 2 -->
                            <div
                                x-show="slide === 2"
                                x-transition:enter="transition ease-out duration-500 transform"
                                x-transition:enter-start="translate-x-full"
                                x-transition:enter-end="translate-x-0"
                                x-transition:leave="transition ease-in duration-500 transform"
                                x-transition:leave-start="translate-x-0"
                                x-transition:leave-end="-translate-x-full"
                                class="absolute inset-0 w-full"
                            >
                                <div class="max-w-[1400px] mx-auto px-12 grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
                                    <div class="max-w-2xl">
                                        <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                                            Buy smart,<br>
                                            <span class="text-red-500">sell smarter!</span>
                                        </h1>
                                        <p class="mt-6 text-gray-600 text-lg max-w-xl">
                                            Dealers wanted! Bulk purchases, great rates
                                            and hassle-free transactions. Let's grow your business together.
                                        </p>
                                        <button class="mt-8 px-8 py-4 bg-red-500 text-white rounded-md hover:bg-red-600 text-lg font-medium">
                                            Order Your Car
                                        </button>
                                    </div>
                                    <div class="flex justify-center lg:justify-end">
                                        <img src="/img/car-png-39071.png" class="max-w-full h-auto">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PREV -->
                        <button
                            @click="slide = slide === 1 ? 2 : 1"
                            class="absolute right-2 lg:right-4 top-1/2 -translate-y-1/2 bg-white border rounded-full p-3 shadow hover:bg-gray-100 z-10"
                        >
                            ‹
                        </button>

                        <!-- NEXT -->
                        <button
                            @click="slide = slide === 2 ? 1 : 2"
                            class="absolute right-2 lg:right-4 top-1/2 -translate-y-1/2 bg-white border rounded-full p-3 shadow hover:bg-gray-100 z-10"
                        >
                            ›
                        </button>
                    </section>

                    <main>
                        <!-- New Cars -->
                        <section class="py-16 bg-gray-50">
                            <div class="max-w-7xl mx-auto px-6">

                                <h2 class="text-2xl font-bold text-gray-900 mb-8">
                                    Latest Added Cars
                                </h2>

                                <!-- Cards grid -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                                    <!-- Card -->
                                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                                        <a href="/view.html">
                                            <img
                                                src="/img/cars/Lexus-RX200t-2016/1.jpeg"
                                                alt="Car"
                                                class="w-full h-48 object-cover"
                                            />
                                        </a>

                                        <div class="p-4">

                                            <!-- Location + Heart -->
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm text-gray-500">New Jersey</span>

                                                <button class="text-gray-400 hover:text-red-500 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                                            -1.935 0-3.597 1.126-4.312 2.733
                                                            -.715-1.607-2.377-2.733-4.313-2.733
                                                            C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12
                                                            9 12s9-4.78 9-12Z"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Title -->
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                2016 – Lexus RX200t
                                            </h3>

                                            <!-- Price -->
                                            <p class="text-orange-500 font-bold text-lg mt-1">
                                                $25,000
                                            </p>

                                            <hr class="my-3">

                                            <!-- Tags -->
                                            <div class="flex flex-wrap gap-2">
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    SUV
                                                </span>
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    Electric
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Card -->

                                    <!-- Duplicate card as needed -->
                                    <!-- Card -->
                                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                                        <a href="/view.html">
                                            <img
                                                src="/img/cars/Lexus-RX200t-2016/1.jpeg"
                                                alt="Car"
                                                class="w-full h-48 object-cover"
                                            />
                                        </a>

                                        <div class="p-4">

                                            <!-- Location + Heart -->
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm text-gray-500">New Jersey</span>

                                                <button class="text-gray-400 hover:text-red-500 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                                            -1.935 0-3.597 1.126-4.312 2.733
                                                            -.715-1.607-2.377-2.733-4.313-2.733
                                                            C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12
                                                            9 12s9-4.78 9-12Z"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Title -->
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                2016 – Lexus RX200t
                                            </h3>

                                            <!-- Price -->
                                            <p class="text-orange-500 font-bold text-lg mt-1">
                                                $25,000
                                            </p>

                                            <hr class="my-3">

                                            <!-- Tags -->
                                            <div class="flex flex-wrap gap-2">
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    SUV
                                                </span>
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    Electric
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Card -->
                                    <!-- Card -->
                                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                                        <a href="/view.html">
                                            <img
                                                src="/img/cars/Lexus-RX200t-2016/1.jpeg"
                                                alt="Car"
                                                class="w-full h-48 object-cover"
                                            />
                                        </a>

                                        <div class="p-4">

                                            <!-- Location + Heart -->
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm text-gray-500">New Jersey</span>

                                                <button class="text-gray-400 hover:text-red-500 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                                            -1.935 0-3.597 1.126-4.312 2.733
                                                            -.715-1.607-2.377-2.733-4.313-2.733
                                                            C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12
                                                            9 12s9-4.78 9-12Z"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Title -->
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                2016 – Lexus RX200t
                                            </h3>

                                            <!-- Price -->
                                            <p class="text-orange-500 font-bold text-lg mt-1">
                                                $25,000
                                            </p>

                                            <hr class="my-3">

                                            <!-- Tags -->
                                            <div class="flex flex-wrap gap-2">
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    SUV
                                                </span>
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    Electric
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Card -->
                                    <!-- Card -->
                                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                                        <a href="/view.html">
                                            <img
                                                src="/img/cars/Lexus-RX200t-2016/1.jpeg"
                                                alt="Car"
                                                class="w-full h-48 object-cover"
                                            />
                                        </a>

                                        <div class="p-4">

                                            <!-- Location + Heart -->
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm text-gray-500">New Jersey</span>

                                                <button class="text-gray-400 hover:text-red-500 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                                            -1.935 0-3.597 1.126-4.312 2.733
                                                            -.715-1.607-2.377-2.733-4.313-2.733
                                                            C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12
                                                            9 12s9-4.78 9-12Z"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Title -->
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                2016 – Lexus RX200t
                                            </h3>

                                            <!-- Price -->
                                            <p class="text-orange-500 font-bold text-lg mt-1">
                                                $25,000
                                            </p>

                                            <hr class="my-3">

                                            <!-- Tags -->
                                            <div class="flex flex-wrap gap-2">
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    SUV
                                                </span>
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    Electric
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Card -->
                                    <!-- Card -->
                                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                                        <a href="/view.html">
                                            <img
                                                src="/img/cars/Lexus-RX200t-2016/1.jpeg"
                                                alt="Car"
                                                class="w-full h-48 object-cover"
                                            />
                                        </a>

                                        <div class="p-4">

                                            <!-- Location + Heart -->
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm text-gray-500">New Jersey</span>

                                                <button class="text-gray-400 hover:text-red-500 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                                            -1.935 0-3.597 1.126-4.312 2.733
                                                            -.715-1.607-2.377-2.733-4.313-2.733
                                                            C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12
                                                            9 12s9-4.78 9-12Z"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Title -->
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                2016 – Lexus RX200t
                                            </h3>

                                            <!-- Price -->
                                            <p class="text-orange-500 font-bold text-lg mt-1">
                                                $25,000
                                            </p>

                                            <hr class="my-3">

                                            <!-- Tags -->
                                            <div class="flex flex-wrap gap-2">
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    SUV
                                                </span>
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    Electric
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Card -->
                                    <!-- Card -->
                                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                                        <a href="/view.html">
                                            <img
                                                src="/img/cars/Lexus-RX200t-2016/1.jpeg"
                                                alt="Car"
                                                class="w-full h-48 object-cover"
                                            />
                                        </a>

                                        <div class="p-4">

                                            <!-- Location + Heart -->
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm text-gray-500">New Jersey</span>

                                                <button class="text-gray-400 hover:text-red-500 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                                            -1.935 0-3.597 1.126-4.312 2.733
                                                            -.715-1.607-2.377-2.733-4.313-2.733
                                                            C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12
                                                            9 12s9-4.78 9-12Z"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Title -->
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                2016 – Lexus RX200t
                                            </h3>

                                            <!-- Price -->
                                            <p class="text-orange-500 font-bold text-lg mt-1">
                                                $25,000
                                            </p>

                                            <hr class="my-3">

                                            <!-- Tags -->
                                            <div class="flex flex-wrap gap-2">
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    SUV
                                                </span>
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    Electric
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Card -->
                                </div>
                            </div>
                        </section>
                        <!--/ New Cars -->
                    </main>
                </div>
            </div>
        </div>

        <div>
            <footer class="bg-red-700 text-gray-300 py-12">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                    <!-- Contact Widget -->
                    <div>
                        <h3 class="text-white text-lg font-semibold mb-4">Contact</h3>
                        <address class="not-italic text-gray-400 mb-4">
                            43 Raymouth Rd. Baltemoer, London 3910
                        </address>
                        <ul class="space-y-2">
                            <li>
                                <a href="tel://11234567890" class="text-gray-400 hover:text-white transition">
                                    +1(123)-456-7890
                                </a>
                            </li>
                            <li>
                                <a href="tel://11234567890" class="text-gray-400 hover:text-white transition">
                                    +1(123)-456-7890
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@mydomain.com" class="text-gray-400 hover:text-white transition">
                                    info@mydomain.com
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Sources Widget -->
                    <div>
                        <h3 class="text-white text-lg font-semibold mb-4">Sources</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    About us
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Services
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Inquiries
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Terms
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Privacy
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Links Widget -->
                    <div>
                        <h3 class="text-white text-lg font-semibold mb-4">Links</h3>
                        <ul class="space-y-2 mb-6">
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Our Vision
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    About us
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    Contact us
                                </a>
                            </li>
                        </ul>

                        <!-- Social Links -->
                        <div class="flex gap-3">
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-500 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-500 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-500 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-500 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Newsletter (Optional 4th column) -->
                    <div>
                        <h3 class="text-white text-lg font-semibold mb-4">Newsletter</h3>
                        <p class="text-gray-400 mb-4 text-sm">
                            Subscribe to our newsletter for updates and exclusive offers.
                        </p>
                        <form class="flex">
                            <input
                                type="email"
                                placeholder="Your email"
                                class="flex-1 px-4 py-2 rounded-l-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:border-red-500"
                            />
                            <button
                                type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded-r-md hover:bg-red-600 transition"
                            >
                                →
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-white mt-12 pt-8 text-center">
                    <p class="text-gray-400 text-sm">
                        Copyright &copy; 2026.
                        All Rights Reserved. &mdash; Designed with love by
                        <a href="#" class="text-white hover:text-red-400 transition">Felixson Adumeta</a>
                    </p>
                </div>
            </div>
            </footer>
        </div>
    </body>
</html>
