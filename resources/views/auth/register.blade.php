<x-layouts.login>

    <!-- Background Gradasi -->
    <div class="min-h-screen w-full flex flex-col items-center justify-center px-4 overflow-hidden" style="background: linear-gradient(to top, rgb(11, 39, 83), rgb(14, 49, 105), rgb(19, 64, 138));">

        <!-- Versi Mobile-->
        <div class="flex flex-col items-center lg:hidden">

            <!-- Logo -->
            <div class="mb-2">
                <img src="{{ asset('image/logo.svg') }}" alt="FoundIt Logo" class="w-[160px] h-[160px] drop-shadow-md -mt-5" />
            </div>

            <!-- Register Box -->
            <div class="bg-white rounded-[20px] w-[360px] h-[550px] p-[30px] space-y-[10px] shadow-[0_4px_20px_rgba(30,30,30,0.1)] mb-8 -mt-15">
                <h2 class="font-poppins font-bold text-[20px] mb-2">Register</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Username -->
                    <div>
                        <x-input-label for="username" :value="__('Username')" />
                        <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] mt-2">
                            <img src="{{ asset('image/username.svg') }}" alt="Username Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 pointer-events-none" />
                            <x-text-input id="username" class="block w-full pl-11 py-3 font-poppins text-sm placeholder-montserrat placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl" type="text" name="username" :value="old('username')" placeholder="Masukkan username" required autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] mt-2">
                            <img src="{{ asset('image/email.svg') }}" alt="Email Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-6 h-6 pointer-events-none" />
                            <x-text-input id="email" class="block w-full pl-11 py-3 font-poppins text-sm placeholder-montserrat placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl" type="email" name="email" :value="old('email')" placeholder="Masukkan email" required autocomplete="email" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] mt-2">
                            <img src="{{ asset('image/password.svg') }}" alt="Password Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 pointer-events-none" />
                            <x-text-input id="password" class="block w-full pl-11 py-3 font-poppins text-sm placeholder:font-poppins placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl" type="password" name="password" placeholder="Masukkan password" required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] mt-2">
                            <img src="{{ asset('image/password.svg') }}" alt="Password Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 pointer-events-none" />
                            <x-text-input id="password_confirmation" class="block w-full pl-11 py-3 font-poppins text-sm placeholder:font-poppins placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl" type="password" name="password_confirmation" placeholder="Masukkan password" required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div>
                        <!-- Tombol Daftar -->
                        <x-primary-button class="mt-5 bg-[#F98125] hover:bg-[#e0701e] w-full normal-case justify-center text-white font-bold font-poppins h-[45px] shadow-lg shadow-black/10">
                            {{ __('Daftar') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
            <!-- Sudah punya akun -->
            <p class="text-white mt-5 text-sm text-center font-poppins">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-bold text-white underline-offset-2">Login</a>
            </p>
        </div>

        <!-- Versi Desktop -->
        <div class="hidden lg:flex w-full max-w-[900px] h-[600px] bg-white rounded-[20px] shadow-[0_4px_20px_rgba(30,30,30,0.1)] overflow-hidden">

            <!-- Kiri (Logo & Ilustrasi) -->
            <div class="w-[400px] h-full flex flex-col items-center bg-[#f5f5f5] pt-10 px-6 relative">
                <!-- Logo -->
                <img src="{{ asset('image/logo_desktop.svg') }}" alt="Logo" class="w-[280px] h-[78px] mt-8 mb-6" />
                <!-- Ilustrasi -->
                <img src="{{ asset('image/register_illustration.svg') }}" alt="Ilustrasi" class="w-[300px] mt-12" />
            </div>

            <!-- Kanan (Form Register) -->
            <div class="flex-1 flex items-center justify-center px-10">
                <div class="w-full max-w-[440px]">
                    <h2 class="text-[28px] font-bold font-poppins text-[#1E1E1E] mb-4 text-center">Register</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Username -->
                        <x-input-label for="username" :value="__('Username')" class="mb-2" />
                        <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] mb-2">
                            <img src="{{ asset('image/username.svg') }}" alt="Username Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 pointer-events-none" />
                            <x-text-input
                                id="username"
                                class="block w-full pl-11 py-3 font-poppins text-sm placeholder-montserrat placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl"
                                type="text"
                                name="username"
                                :value="old('username')"
                                required
                                autofocus
                                placeholder="Masukkan username"
                                autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('username')" class="mt-1" />

                        <!-- Email -->
                        <x-input-label for="email" :value="__('Email')" class="mb-2 mt-4" />
                        <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] mb-2">
                            <img src="{{ asset('image/email.svg') }}" alt="Email Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-6 h-6 pointer-events-none" />
                            <x-text-input
                                id="email"
                                class="block w-full pl-11 py-3 font-poppins text-sm placeholder-montserrat placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                placeholder="Masukkan email"
                                autocomplete="email" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />

                        <!-- Password -->
                        <x-input-label for="password" :value="__('Password')" class="mb-2 mt-4" />
                        <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] mb-2">
                            <img src="{{ asset('image/password.svg') }}" alt="Password Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 pointer-events-none" />
                            <x-text-input
                                id="password"
                                class="block w-full pl-11 py-3 font-poppins text-sm placeholder-montserrat placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl"
                                type="password"
                                name="password"
                                required
                                placeholder="Masukkan password"
                                autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />

                        <!-- Konfirmasi Password -->
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="mb-2 mt-4" />
                        <div class="relative flex items-center bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.3)]">
                            <img src="{{ asset('image/password.svg') }}" alt="Password Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 pointer-events-none" />
                            <x-text-input
                                id="password_confirmation"
                                class="block w-full pl-11 py-3 font-poppins text-sm placeholder-montserrat placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none rounded-xl"
                                type="password"
                                name="password_confirmation"
                                required
                                placeholder="Masukkan password"
                                autocomplete="new-password" />
                        </div>

                        <!-- Tombol Daftar -->
                        <div class="mt-10">
                            <x-primary-button class="w-full flex items-center justify-center normal-case bg-[#F98125] hover:bg-[#e0701e] text-white font-bold text-[16px] rounded-lg py-2 font-poppins shadow-lg shadow-black/10">
                                Daftar
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Sudah punya akun -->
                    <div class="mt-5 text-center">
                        <p class="text-sm text-gray-600">
                            Sudah punya akun? <a href="{{ route('login') }}" class="font-bold text-[#000000]">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layouts.login>