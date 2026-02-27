<div>
    <!-- Hero Slider -->
    <div>
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
    </div>
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="mb-6"> For purchases, orders or general inquires:</h1>
        <p>Please fill in the form below to reach us now!</p>
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium mb-1">E-mail</label>
                    <input
                        type="email"
                        placeholder="John@example.com"
                        wire:model="email"
                        class="w-full rounded-md border border-red-300 px-3 py-2 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none"
                    >
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Inquiry Type -->
                <div>
                    <label class="block text-sm font-medium mb-1">Inquiry Type</label>
                    <select
                        wire:model="inquiry"
                        class="w-full rounded-md border border-red-500 px-3 py-2 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none">
                        <option value="" selected>Select-Inquiry-Type</option>
                        <option value="" >General</option>
                        <option value="" >Purchase</option>
                        <option value="">Make an offer</option>
                        <option value="">Test Drive</option>
                    </select>
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
        </form>
    </div>
</div>
