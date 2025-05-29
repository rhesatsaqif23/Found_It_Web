<head>
    <title>Login</title>
</head>

<x-layouts.login>

    <!-- Background Gradasi -->
    <div class="min-h-screen w-full flex items-center justify-center px-4 py-8 overflow-hidden"
        style="background: linear-gradient(to top,rgb(11, 39, 83),rgb(14, 49, 105),rgb(19, 64, 138));">

        <!-- Versi Mobile -->
        <div class="flex flex-col items-center lg:hidden">
            <!-- Logo -->
            <div class="mb-4">
                <img src="{{ asset('assets/logo.svg') }}" alt="FoundIt Logo"
                    class="w-auto h-[160px] rounded-full object-cover" />
            </div>

            <!-- Login Box -->
            <div
                class="bg-white rounded-[20px] w-[330px] h-[500px] p-[25px] space-y-[10px] shadow-[0_4px_20px_rgba(30,30,30,0.1)]">
                <h2 class="font-poppins font-bold text-[20px] mb-2">Login</h2>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <x-input-label for="email" :value="__('Email')" class="mt-3 mb-3 text-[16px] font-semibold" />

                    <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)]">
                        <img src="{{ asset('assets/username.svg') }}" alt="Email Icon"
                            class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 pointer-events-none" />
                        <x-text-input id="email"
                            class="block w-full pl-11 py-3 font-poppins text-sm placeholder-montserrat placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl"
                            type="email" name="email" :value="old('email')" placeholder="Masukkan email" required
                            autofocus autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <!-- Password -->
                    <x-input-label for="password" :value="__('Password')" class="mt-3 mb-3" />
                    <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)]">
                        <img src="{{ asset('assets/password.svg') }}" alt="Password Icon"
                            class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 pointer-events-none" />
                        <x-text-input id="password"
                            class="block w-full pl-11 py-3 font-poppins text-sm placeholder:font-poppins placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl"
                            type="password" name="password" placeholder="Masukkan password" required
                            autocomplete="current-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between mt-8">
                        <label for="remember_me" class="flex items-center space-x-2">
                            <input id="remember_me" type="checkbox" class="toggle-checkbox hidden" name="remember" />
                            <div
                                class="relative w-9 h-5 bg-gray-500 rounded-full shadow-inner transition duration-300 ease-in-out">
                                <div class="absolute w-4 h-4 bg-white rounded-full shadow inset-y-0 left-0.5 transition-transform duration-300 ease-in-out transform toggle-dot"
                                    style="top: 2px;"></div>
                            </div>
                            <span class="text-sm text-gray-600 font-montserrat">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-sm text-dark-blue hover:text-dark-blue/80">
                                {{ __('Lupa Password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Tombol Masuk -->
                    <div class="mt-6">
                        <button type="submit"
                            class="normal-case text-[16px] bg-[#F98125] hover:bg-[#e0701e] w-full justify-center text-white font-semibold font-poppins py-2 rounded-lg shadow-lg shadow-black/10">
                            Masuk
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="flex items-center my-4">
                        <hr class="flex-grow border-t border-gray-300">
                        <span class="mx-4 text-gray-500">atau</span>
                        <hr class="flex-grow border-t border-gray-300">
                    </div>

                    <!-- Google Login -->
                    <button type="button"
                        class="flex items-center justify-center gap-x-3 h-[45px] w-full bg-[#F98125] text-white font-semibold font-poppins rounded-lg py-2 hover:bg-[#e0701e] relative shadow-lg shadow-black/10">
                        <img src="{{ asset('assets/google.svg') }}" alt="Google Icon" class="w-7 h-7" />
                        Masuk dengan Google
                    </button>

                </form>
            </div>

            <!-- Register Link -->
            <p class="text-white mt-10 text-sm text-center">
                Belum punya akun? <a href="{{ route('register') }}" class="font-bold">Daftar</a>
            </p>
        </div>

        <!-- Versi Desktop -->
        <div
            class="hidden lg:flex w-full max-w-[900px] h-[600px] bg-white rounded-[20px] shadow-[0_4px_20px_rgba(30,30,30,0.1)] overflow-hidden">

            <!-- Kiri (Logo & Ilustrasi) -->
            <div class="w-[400px] h-full flex flex-col items-center bg-[#f5f5f5] pt-10 px-6 relative">
                <!-- Logo -->
                <img src="{{ asset('assets/logo_desktop.svg') }}" alt="Logo" class="w-[280px] h-[78px] mt-8 mb-6" />
                <!-- Ilustrasi -->
                <img src="{{ asset('assets/login_illustration.svg') }}" alt="Ilustrasi" class="w-[300px] mt-12" />
            </div>

            <!-- Kanan (Form Login) -->
            <div class="flex-1 flex items-center justify-center px-10">
                <div class="w-full max-w-[440px]">
                    <h2 class="text-[28px] font-bold font-poppins text-[#1E1E1E] mb-4 text-center">Login</h2>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <x-input-label for="email" :value="__('Email')" class="mb-2" />
                        <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)]">
                            <img src="{{ asset('assets/username.svg') }}" alt="Email Icon"
                                class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 pointer-events-none" />
                            <x-text-input id="email"
                                class="block w-full pl-11 py-3 font-poppins text-sm placeholder-montserrat placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl"
                                type="email" name="email" :value="old('email')" required autofocus
                                placeholder="Masukkan email" autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        <!-- Password -->
                        <x-input-label for="password" :value="__('Password')" class="mt-4 mb-2" />
                        <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)]">
                            <img src="{{ asset('assets/password.svg') }}" alt="Password Icon"
                                class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 pointer-events-none" />
                            <x-text-input id="password"
                                class="block w-full pl-11 py-3 font-poppins text-sm placeholder-montserrat placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl"
                                type="password" name="password" required placeholder="Masukkan password"
                                autocomplete="current-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        <!-- Remember + Forgot -->
                        <div class="flex items-center justify-between mt-6">
                            <label for="remember_me_desktop" class="flex items-center space-x-2">
                                <input id="remember_me_desktop" type="checkbox" class="toggle-checkbox hidden"
                                    name="remember" />
                                <div
                                    class="relative w-9 h-5 bg-gray-600 rounded-full shadow-inner transition duration-300 ease-in-out">
                                    <div class="absolute w-4 h-4 bg-white rounded-full shadow inset-y-0 left-0.5 transition-transform duration-300 ease-in-out transform toggle-dot"
                                        style="top: 2px;"></div>
                                </div>
                                <span class="text-sm">Ingat saya</span>
                            </label>

                            <a href="{{ route('password.request') }}"
                                class="text-sm text-dark-blue hover:underline">Lupa Password?</a>
                        </div>

                        <!-- Tombol Masuk -->
                        <div class="mt-6">
                            <button type="submit"
                                class="w-full flex items-center justify-center normal-case bg-[#F98125] hover:bg-[#e0701e] text-white font-semibold text-[16px] rounded-lg py-2 font-poppins shadow-lg shadow-black/10">
                                Masuk
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="flex items-center my-4">
                            <hr class="flex-grow border-t border-gray-300">
                            <span class="mx-4 text-gray-500">atau</span>
                            <hr class="flex-grow border-t border-gray-300">
                        </div>

                        <!-- Google -->
                        <button type="button"
                            class="flex items-center justify-center gap-x-3 w-full bg-[#F98125] h-[45px] text-white font-semibold rounded-lg py-2 hover:bg-[#e0701e] relative shadow-lg shadow-black/10">
                            <img src="{{ asset('assets/google.svg') }}" alt="Google Icon" class="7 h-7" />
                            Masuk dengan Google
                        </button>

                    </form>

                    <!-- Register -->
                    <div class="mt-auto pt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Belum punya akun? <a href="{{ route('register') }}"
                                class="font-bold text-[#000000]">Daftar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        input.toggle-checkbox:checked+div {
            background-color: #F98125;
        }

        input.toggle-checkbox:checked+div>.toggle-dot {
            transform: translateX(90%);
        }
    </style>

</x-layouts.login>