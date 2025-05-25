{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('barangs.index')" :active="request()->routeIs('barangs.*')">
                        {{ __('Barang') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endauth

                @guest
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-gray-900">Login</a>
                    <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-gray-900">Register</a>
                </div>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth

        @guest
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-3 space-y-1 px-4">
                <a href="{{ route('login') }}" class="block text-sm text-gray-700 hover:text-gray-900">Login</a>
                <a href="{{ route('register') }}" class="block text-sm text-gray-700 hover:text-gray-900">Register</a>
            </div>
        </div>
        @endguest
    </div>
</nav> --}}

<nav
    class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-[#002347] to-[#184a90] border-b-[3px] border-[#f98125]">
    <div class="max-w-[1512px] mx-auto flex items-center justify-between px-[25px] md:px-[100px] py-[20px]">
        <!-- Logo -->
        <div class="flex items-center gap-[15px]">
            <img src="{{ asset('assets/logo_kecil.svg') }}" alt="Logo"
                class="w-[40px] h-[40px] md:w-[45px] md:h-[45px]" />
            <h1 class="text-[24px] md:text-[28px] font-extrabold tracking-[1px] md:tracking-[2px] font-['Hellix']">
                <span class="text-[#f8f8f8]">Found</span><span class="text-[#F98125]">It!</span>
            </h1>
        </div>

        <!-- Search Bar -->
        <div x-data="{ open: false, search: '', history: ['charger type c', 'tws soundcore', 'mouse logitech'] }"
            class="relative hidden lg:flex flex-[1_1_0%] min-w-0 items-center gap-2 bg-white px-4 py-1 rounded-[10px] max-w-[600px] shadow ml-[20px] mr-4"
            @click.away="open = false">
            <img src="{{ asset('assets/cari_abu.svg') }}" alt="Cari" class="w-[24px] h-[24px]" />

            <input type="text" placeholder="Cari barang" x-model="search" @focus="open = true"
                @keydown.enter="if (search.trim() && !history.includes(search.trim())) history.unshift(search.trim()); open = false"
                class="flex-1 border-none outline-none ring-0 focus:ring-0 focus:outline-none bg-transparent text-[16px] font-normal text-[#5D5D5D] font-['Poppins']" />

            <div x-show="open" class="absolute top-[110%] left-0 bg-white w-full rounded-md shadow-lg border z-50">
                <template x-for="(item, index) in history" :key="index">
                    <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer">
                        <div class="flex items-center gap-2 text-gray-700 text-[14px]">
                            <img src="{{ asset('assets/riwayat.svg') }}" alt="Riwayat" class="w-[32px] h-[32px]" />
                            <span x-text="item"></span>
                        </div>
                        <button @click="history.splice(index, 1)" class="hover:opacity-70">
                            <img src="{{ asset('assets/batal.svg') }}" alt="Hapus" class="w-[24px] h-[24px]" />
                        </button>
                    </div>
                </template>
            </div>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-[25px] text-white text-[16px] font-medium font-['Poppins']">
            @auth
                <div class="relative group">
                    <button class="focus:outline-none text-white">
                        Lapor Barang
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-300 ease-in-out z-50 overflow-hidden">
                        <a href="{{ route('barangs.lapor-hilang') }}"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Barang Hilang</a>
                        <a href="{{ route('barangs.lapor-temuan') }}"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Barang Temuan</a>
                    </div>
                </div>

                <a href="{{ route('barangs.index') }}">Riwayat Laporan</a>

                <div class="relative group">
                    <button class="focus:outline-none text-white">
                        Akun
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-300 ease-in-out z-50 overflow-hidden">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endguest
        </div>

        <!-- Hamburger for mobile -->
        <div class="md:hidden">
            <button @click="$store.mobileMenu.open = !$store.mobileMenu.open" class="text-white focus:outline-none">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Navigation --}}
    <x-mobile-navigation />
</nav>