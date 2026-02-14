<header class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex h-16 items-center justify-between">

            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="/img/logoipsum-265.svg" alt="Logo" class="h-8">
            </a>

            <!-- Mobile toggle -->
            <button
                @click="mobileOpen = !mobileOpen"
                class="md:hidden p-2 rounded hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </button> 

            <!-- Desktop navigation -->
            <div class="hidden md:flex items-center space-x-4">
                <a wire:navigate href="{{ route('welcome') }}" class="font-bold text-red-700 hover:text-red-500 hover:underline focus-visible:text-red-500">Home</a>
                <a wire:navigate href="{{ route('about-us') }}" class="font-bold text-red-700 hover:text-red-500 hover:underline">About</a>
                <a wire:navigate href="{{ route('services') }}" class="font-bold text-red-700 hover:text-red-500 hover:underline">Services</a>
                <a wire:navigate href="{{ route('Terms&privacy') }}" class="font-bold text-red-700 hover:text-red-500 hover:underline">Terms</a>
                <a wire:navigate href="{{ route('inquiries') }}" class="font-bold text-red-700 hover:text-red-500 hover:underline">Inquiries</a>

                <!-- Account dropdown -->
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button
                            @click="open = !open"
                            type="button"
                            class="flex items-center gap-1 px-3 py-2 text-sm font-medium hover:text-gray-700"
                        >
                            My Account
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 transition-transform duration-200"
                                :class="open && 'rotate-180'"
                                fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </button>

                        <ul
                            x-show="open"
                            @click.away="open = false"
                            x-transition
                            class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50"
                        >
                            <li>
                                <a href="my_cars.html"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    My Cars
                                </a>
                            </li>
                            <li>
                                <a href="watchlist.html"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    My Favourite Cars
                                </a>
                            </li>
                            <li class="border-t">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-dark bg-white hover:bg-gray-100 border-0"
                                        style="background-color: white !important; color: rgb(82, 77, 77) !important"
                                    >
                                        {{ __('Log out') }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth

                @guest
                <!-- Signup -->
                <a href="{{ route('register') }}"
                   class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md text-sm hover:bg-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 6a3.75 3.75 0 1 1-7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0Z"/>
                    </svg>
                    Signup
                </a>

                <!-- Login -->
                <a href="{{ route('login') }}"
                   class="inline-flex items-center px-4 py-2 border rounded-md text-sm hover:bg-gray-100">
                    <svg viewBox="0 0 1024 1024"
                         class="w-4 h-4 mr-1 fill-current">
                        <path d="M426.666667 736V597.333333H128v-170.666666h298.666667V288L650.666667 512 426.666667 736M341.333333 85.333333h384a85.333333 85.333333 0 0 1 85.333334 85.333334v682.666666a85.333333 85.333333 0 0 1-85.333334 85.333334H341.333333a85.333333 85.333333 0 0 1-85.333333-85.333334v-170.666666h85.333333v170.666666h384V170.666667H341.333333v170.666666H256V170.666667a85.333333 85.333333 0 0 1 85.333333-85.333334z"/>
                    </svg>
                    Login
                </a>
                @endguest
            </div>
        </div>

        <!-- Mobile menu -->
        <div
            x-show="mobileOpen"
            @click.away="mobileOpen = false"
            x-transition
            class="md:hidden border-t py-4 space-y-2">

            <a wire:navigate href="{{ route('welcome') }}" class="block px-4 py-2 font-bold text-red-700 hover:bg-gray-100">Home</a>
            <a wire:navigate href="{{ route('about-us') }}" class="block px-4 py-2 font-bold text-red-700 hover:bg-gray-100">About</a>
            <a wire:navigate href="{{ route('services') }}" class="block px-4 py-2 font-bold text-red-700 hover:bg-gray-100">Services</a>
            <a wire:navigate href="{{ route('Terms&privacy') }}" class="block px-4 py-2 font-bold text-red-700 hover:bg-gray-100">Terms</a>
            <a wire:navigate href="{{ route('inquiries') }}" class="block px-4 py-2 font-bold text-red-700 hover:bg-gray-100">Inquiries</a>

            @auth
                <div class="border-t pt-2 mt-2">
                    <a href="my_cars.html" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Cars</a>
                    <a href="watchlist.html" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Favourite Cars</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                            {{ __('Log out') }}
                        </button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="border-t pt-2 mt-2 px-4 space-y-2">
                    <a href="{{ route('register') }}" class="block w-full text-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Signup
                    </a>
                    <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 border rounded-md hover:bg-gray-100">
                        Login
                    </a>
                </div>
            @endguest
        </div>
    </div>
</header>
