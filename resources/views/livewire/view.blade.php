{{-- Add at the top of your view file --}}
@push('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

<div>
    <main class="bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @foreach ($car_details as $data)
                <!-- Page Title -->
                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                    {{ $data->title }} - {{ $data->year }}
                </h1>

                <div class="text-sm text-gray-500 mb-6">
                    {{ $data->location }} - {{ $data->created_at->diffForHumans() }}
                </div>

                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Left Column -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Image Carousel with Alpine.js -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden"
                            x-data="{
                                currentImage: 0,
                                images: {{ json_encode($data->images->pluck('image_path')->values()) }}
                            }">
                            <div class="relative">
                                <!-- Main Image -->
                                <div class="aspect-video bg-gray-200">
                                    <template x-if="images.length > 0">
                                        <img
                                            :src="`{{ asset('storage/') }}/${images[currentImage]}`"
                                            alt="{{ $data->title }}"
                                            class="w-full h-full object-cover"
                                        />
                                    </template>
                                    <template x-if="images.length === 0">
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </template>
                                </div>

                                <!-- Navigation Buttons -->
                                <button
                                    @click="currentImage = currentImage > 0 ? currentImage - 1 : images.length - 1"
                                    x-show="images.length > 1"
                                    class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow-lg transition"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                    </svg>
                                </button>

                                <button
                                    @click="currentImage = currentImage < images.length - 1 ? currentImage + 1 : 0"
                                    x-show="images.length > 1"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow-lg transition"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Thumbnails -->
                            <div class="flex gap-2 p-4 bg-gray-50 overflow-x-auto" x-show="images.length > 0">
                                <template x-for="(image, index) in images" :key="index">
                                    <img
                                        :src="`{{ asset('storage/') }}/${image}`"
                                        alt="Thumbnail"
                                        @click="currentImage = index"
                                        class="w-24 h-16 object-cover rounded cursor-pointer hover:opacity-75 transition border-2 flex-shrink-0"
                                        :class="currentImage === index ? 'border-red-500' : 'border-transparent hover:border-gray-300'"
                                    />
                                </template>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Detailed Description</h2>
                            <div class="space-y-4 text-gray-700 leading-relaxed">
                                <p>{{ $data->description }}</p>
                            </div>
                        </div>

                        <!-- Dynamic Car Specifications -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Car Specifications</h2>
                            @if($data->features->count() > 0)
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    @foreach($data->features as $feature)
                                        <li class="flex items-center gap-2 text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-500 flex-shrink-0">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $feature->feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">No specifications listed.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Right Sidebar -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-lg shadow-md p-6 sticky top-6">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-3xl font-bold text-red-500">${{ number_format($data->price, 2) }}</p>
                                <button class="p-2 text-gray-400 hover:text-red-500 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>
                            </div>

                            <hr class="my-4" />

                            <table class="w-full text-sm">
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <th class="text-left py-2 text-gray-600 font-medium">Maker</th>
                                        <td class="text-right py-2 text-gray-900">{{ $data->make }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left py-2 text-gray-600 font-medium">Model</th>
                                        <td class="text-right py-2 text-gray-900">{{ $data->model }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left py-2 text-gray-600 font-medium">Year</th>
                                        <td class="text-right py-2 text-gray-900">{{ $data->year }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left py-2 text-gray-600 font-medium">Car Type</th>
                                        <td class="text-right py-2 text-gray-900">{{ ucfirst($data->body_type) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left py-2 text-gray-600 font-medium">Fuel Type</th>
                                        <td class="text-right py-2 text-gray-900">{{ ucfirst($data->fuel_type) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</div>
