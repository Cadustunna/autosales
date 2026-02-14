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
    <div>
        <h1 class="text-7xl font-bold text-center text-uppercase m-3">
            This is Terms & privacy page
        </h1>
    </div>
</div>
