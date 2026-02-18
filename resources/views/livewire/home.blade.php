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
                        <!-- Available Brands -->
                        <section>
                            <div class="max-w-7xl mx-auto px-6 text-center">
                                <h1 class="text-2xl font-bold text-gray-900 mb-8">
                                    Available Brands
                                </h1>
                                <p>
                                    Check out some of the brands that we sell:
                                </p>
                            </div>
                        </section>
                        <!-- /Available Brands -->

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
                                                ${{number_format($car->price, 2) }}
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
                                </div>
                            </div>
                        </section>
                        <!--/ New Cars -->

                        <!-- Stay in Touch -->
                        <section>
                            <div class="max-w-7xl mx-auto px-6 text-center">
                                <h1 class="text-2xl font-bold text-gray-900 mb-8">
                                    Stay in Touch
                                </h1>
                                <p>
                                    We're excited to connect with you! Reach out by filling out the form below:
                                </p>
                                <hr class="mt-5 mb-5">
                                <div class="max-w-7xl mx-auto px-6 text-center">
                                    <h4 class="text-2xl font-bold text-gray-900 mb-2">
                                        Fill out this form
                                    </h2>
                                    <p class="mb-5">Your message are secured with client-side encryption. <a href="" class="text-red-600 hover:text-red-800">Learn More</a></p>
                                </div>
                                <div>
                                    @if (session()->has('success'))
                                        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form wire:submit="contactForm" action="#"
                                        class="space-y-5 bg-white p-6 rounded-lg shadow m-8">
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <!-- Full Name (Left) -->
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Full name</label>
                                                <input
                                                    type="text"
                                                    placeholder="John Doe"
                                                    wire:model="name"
                                                    class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none"
                                                >
                                                @error('name')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Phone Number (Right) -->
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Phone number</label>
                                                <input
                                                    type="text"
                                                    placeholder="000-000-0000"
                                                    wire:model="phone"
                                                    class="w-full rounded-md border border-red-300 px-3 py-2 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none"
                                                >
                                                @error('phone')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Message (Full Width) -->
                                        <div>
                                            <label class="block text-sm font-medium mb-1">Message</label>
                                            <textarea
                                                wire:model="message"
                                                rows="5"
                                                placeholder="Type your message here..."
                                                class="w-full rounded-md border border-red-500 px-3 py-2 focus:border-red-400 focus:ring-1 focus:ring-red-400 outline-none"
                                            ></textarea>
                                            @error('message')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="flex justify-end">
                                            <button
                                                type="submit"
                                                wire:confirm='Are you sure you want to make this inquiry?'
                                                class="rounded-md bg-red-600 px-6 py-2 text-white hover:bg-red-700 transition"
                                            >
                                                Send
                                            </button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <!-- /Stay in Touch -->
                    </main>
                </div>
            </div>
        </div>
</div>
