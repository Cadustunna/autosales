<div>

        <div class="bg-gray-50 text-black/50 ">
            <div class=" w-full flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

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
                                        <p class="mt-6 mb-6 text-gray-600 text-lg max-w-xl">
                                            Quality cars, exceptional prices,
                                            and a hassle-free experience. What more could you ask for?
                                        </p>
                                        <a href="{{ route('inquiries') }}" class="mt-8 px-8 py-4 bg-red-500 text-white rounded-md hover:bg-red-600 text-lg font-medium">
                                            Order Your Car
                                        </a>
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
                                        <p class="mt-6 mb-6 text-gray-600 text-lg max-w-xl">
                                            Dealers wanted! Bulk purchases, great rates
                                            and hassle-free transactions. Let's grow your business together.
                                        </p>
                                        <a href ={{ route('inquiries') }} class="mt-8 px-8 py-4 bg-red-500 text-white rounded-md hover:bg-red-600 text-lg font-medium">
                                            Order Your Car
                                        </a>
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
                                    @foreach ($latestCars as $car)
                                    <!-- Card -->
                                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                                        @if($car->primaryImage)

                                        <a href="{{ route('car.details', $car->id) }}">
                                            <img
                                                src="{{ asset('storage/' . $car->primaryImage->image_path) }}"
                                                alt="Car"
                                                class="w-full h-48 object-cover"
                                            />
                                        </a>
                                        @endif
                                        <div class="p-4">

                                            <!-- Location + Heart -->
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm text-gray-500">{{ $car->location  }}</span>

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
                                                {{$car->year}} – {{ $car->make }} {{ $car->model }}
                                            </h3>

                                            <!-- Price -->
                                            <p class="text-orange-500 font-bold text-lg mt-1">
                                                {{ $car->price }}
                                            </p>

                                            <hr class="my-3">

                                            <!-- Tags -->
                                            <div class="flex flex-wrap gap-2">
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    {{ $car->title }}
                                                </span>
                                                <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                                                    ${{ $car->fuel_type }}
                                                </span>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- /Card -->
                                    @endforeach
                                    <!-- Duplicate card as needed -->
                                    <!-- Card -->
                                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                                        <a wire:navigate href="{{ route('car.details', $car->id) }}">
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
</div>
