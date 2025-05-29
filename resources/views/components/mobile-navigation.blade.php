{{-- resources/views/components/mobile-navigation.blade.php --}}
<div x-show="$store.mobileMenu.open" x-transition:enter="transition ease-out duration-250"
    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"
    class="fixed top-0 right-0 w-[322px] h-full z-50 bg-[#193a6f] shadow-2xl transform" x-cloak>
    <div class="flex flex-col gap-[5px] w-full h-full overflow-hidden">
        {{-- Close Button --}}
        <div class="flex justify-end px-[20px] py-[20px]">
            <button @click="$store.mobileMenu.open = false">
                <img src="{{ asset('assets/batal_putih.svg') }}" alt="Tutup" class="w-[24px] h-[24px]" />
            </button>
        </div>

        @auth
            {{-- Beranda --}}
            <a href="{{ route('home') }}"
                class="flex items-center justify-between px-[20px] py-[8px] text-white text-[14px] font-medium font-['Poppins']">
                Beranda
                <img src="{{ asset('assets/lanjut.svg') }}" alt=">" class="w-[14px] h-[14px]" />
            </a>
            <div class="w-full h-px bg-white opacity-50"></div>

            {{-- Lapor Barang Hilang --}}
            <a href="{{ route('barangs.lapor-hilang') }}"
                class="flex items-center justify-between px-[20px] py-[8px] text-white text-[14px] font-medium font-['Poppins']">
                Lapor Barang Hilang
                <img src="{{ asset('assets/lanjut.svg') }}" alt=">" class="w-[14px] h-[14px]" />
            </a>
            <div class="w-full h-px bg-white opacity-50"></div>

            {{-- Lapor Barang Temuan --}}
            <a href="{{ route('barangs.lapor-temuan') }}"
                class="flex items-center justify-between px-[20px] py-[8px] text-white text-[14px] font-medium font-['Poppins']">
                Lapor Barang Temuan
                <img src="{{ asset('assets/lanjut.svg') }}" alt=">" class="w-[14px] h-[14px]" />
            </a>
            <div class="w-full h-px bg-white opacity-50"></div>

            {{-- Riwayat Laporan --}}
            <a href="{{ route('barangs.riwayat') }}"
                class="flex items-center justify-between px-[20px] py-[8px] text-white text-[14px] font-medium font-['Poppins']">
                Riwayat Laporan
                <img src="{{ asset('assets/lanjut.svg') }}" alt=">" class="w-[14px] h-[14px]" />
            </a>
            <div class="w-full h-px bg-white opacity-50"></div>

            {{-- Akun --}}
            <a href="{{ route('profile.edit') }}"
                class="flex items-center justify-between px-[20px] py-[8px] text-white text-[14px] font-medium font-['Poppins']">
                Akun
                <img src="{{ asset('assets/lanjut.svg') }}" alt=">" class="w-[14px] h-[14px]" />
            </a>
        @endauth

        @guest
            {{-- Login --}}
            <a href="{{ route('login') }}"
                class="flex items-center justify-between px-[20px] py-[8px] text-white text-[14px] font-medium font-['Poppins']">
                Login
                <img src="{{ asset('assets/lanjut.svg') }}" alt=">" class="w-[14px] h-[14px]" />
            </a>
            <div class="w-full h-px bg-white opacity-50"></div>

            {{-- Register --}}
            <a href="{{ route('register') }}"
                class="flex items-center justify-between px-[20px] py-[8px] text-white text-[14px] font-medium font-['Poppins']">
                Register
                <img src="{{ asset('assets/lanjut.svg') }}" alt=">" class="w-[14px] h-[14px]" />
            </a>
        @endguest
    </div>
</div>

{{-- Overlay Background --}}
<div x-show="$store.mobileMenu.open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50 z-40"
    @click="$store.mobileMenu.open = false" x-cloak></div>