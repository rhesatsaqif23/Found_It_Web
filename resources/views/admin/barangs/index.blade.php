{{-- @section('title', 'Daftar Barang')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Barang
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @auth
                    <a href="{{ route('barangs.create') }}">
                        <x-primary-button>Tambah Barang</x-primary-button>
                    </a>
                    @else
                    <a href="#" onclick="alert('Anda harus login untuk menambahkan barang.')">
                        <x-primary-button>Tambah Barang</x-primary-button>
                    </a>
                    @endauth

                    <ul class="mt-4 space-y-4">
                        @foreach ($barangs as $barang)
                        <li class="border-b pb-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <a href="{{ route('barangs.show', $barang) }}" class="text-lg font-medium">
                                        {{ $barang->nama }} ({{ $barang->tipe->nama ?? '-' }})
                                    </a>
                                    <p class="text-sm text-gray-500">
                                        {{ $barang->lokasi }} • {{ $barang->waktu }}
                                    </p>
                                </div>

                                <div class="flex space-x-2">
                                    @auth
                                    <a href="{{ route('barangs.edit', $barang) }}">
                                        <x-secondary-button>Edit</x-secondary-button>
                                    </a>
                                    <form action="{{ route('barangs.destroy', $barang) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button>Hapus</x-danger-button>
                                    </form>
                                    @else
                                    <a href="#" onclick="alert('Anda harus login untuk mengedit.')">
                                        <x-secondary-button>Edit</x-secondary-button>
                                    </a>
                                    <x-danger-button
                                        onclick="alert('Anda harus login untuk menghapus.')">Hapus</x-danger-button>
                                    @endauth
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@section('title', 'Beranda')

<x-app-layout>
    <div class="bg-[#f0f9ff] pt-20">

        <!-- Swiper Banner  -->
        <div class="w-full md:hidden block">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="relative w-full pb-[60%]">
                            <div class="absolute inset-0 bg-cover bg-center flex flex-col justify-center px-6 sm:px-12 py-6 text-white"
                                style="background-image: url('{{ asset('assets/banner_hilang.png') }}');">
                                <div class="max-w-[50%]">
                                    <h1 class="text-[20px] sm:text-[32px] font-bold leading-tight">Kehilangan barang?
                                    </h1>
                                    <p class="mt-2 text-sm sm:text-base font-semibold">Temukan atau laporkan dengan
                                        mudah!</p>
                                    <a href="{{ route('barangs.create') }}"
                                        class="inline-block mt-4 px-4 sm:px-6 py-2 sm:py-3 bg-[#f98125] rounded-[10px] text-white font-semibold text-sm sm:text-[18px] w-auto">
                                        Lapor Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="relative w-full pb-[60%]">
                            <div class="absolute inset-0 bg-cover bg-center flex flex-col justify-center px-6 sm:px-12 py-6 text-white"
                                style="background-image: url('{{ asset('assets/banner_poin.png') }}');">
                                <div class="max-w-[50%]">
                                    <h1 class="text-[20px] sm:text-[32px] font-bold leading-tight">Tukar poin jadi uang!
                                    </h1>
                                    <p class="mt-2 text-sm sm:text-base font-semibold">Kembalikan barang milik orang
                                        lain dan raih poin</p>
                                    <a href="#"
                                        class="inline-block mt-4 px-4 sm:px-6 py-2 sm:py-3 bg-[#2c599d] rounded-[10px] text-white font-semibold text-sm sm:text-[18px] w-auto">
                                        Tukarkan Poin
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="max-w-[1512px] mx-auto pt-0 md:pt-8 pb-8 md:px-[50px] lg:px-[100px]">
            <!-- Desktop static version -->
            <div class="hidden md:flex flex-row justify-between gap-4">
                <!-- slide 1 -->
                <div style="background-image: url('{{ asset('assets/banner_hilang.png') }}');"
                    class="bg-cover bg-center rounded-[20px] w-full md:w-1/2 min-h-[290px] p-6 md:p-[40px] text-white flex flex-col justify-center">
                    <div class="max-w-[50%]">
                        <h1 class="text-[20px] md:text-[24px] font-bold leading-tight tracking-wide">
                            Kehilangan barang?
                        </h1>
                        <p class="mt-4 text-[14px] md:text-[16px] font-semibold">
                            Temukan atau laporkan dengan mudah!
                        </p>
                        <a href="{{ route('barangs.create') }}"
                            class="inline-block mt-6 px-4 py-2 bg-[#f98125] rounded-[10px] text-white font-semibold text-sm md:text-base">
                            Lapor Sekarang
                        </a>
                    </div>
                </div>

                <!-- slide 2 -->
                <div style="background-image: url('{{ asset('assets/banner_poin.png') }}');"
                    class="bg-cover bg-center rounded-[20px] w-full md:w-1/2 min-h-[290px] p-6 md:p-[40px] text-white flex flex-col justify-center">
                    <div class="max-w-[50%]">
                        <h1 class="text-[20px] md:text-[24px] font-bold leading-tight tracking-wide">
                            Tukar poin menjadi uang!
                        </h1>
                        <p class="mt-4 text-[14px] md:text-[16px] font-semibold">
                            Kembalikan barang milik orang lain dan raih poin
                        </p>
                        <a href="#"
                            class="inline-block mt-6 px-4 py-2 bg-[#2c599d] rounded-[10px] text-white font-semibold text-sm md:text-base">
                            Tukarkan Poin
                        </a>
                    </div>
                </div>
            </div>

            <h2 class="mt-6 text-[18px] md:text-[20px] font-semibold text-black px-5">Kategori Barang</h2>
            <div class="mt-4 overflow-x-auto overflow-y-visible pb-2">
                <div class="flex gap-4 md:grid md:grid-cols-[repeat(auto-fit,minmax(100px,1fr))]">
                    <!-- Spacer kiri -->
                    <div class="shrink-0 md:hidden" style="width: 5px;"></div>

                    @foreach ($kategoris as $kategori)
                        <div
                            class="aspect-square min-w-[100px] bg-white shadow rounded-[10px] flex flex-col items-center justify-center p-3 shrink-0">
                            <img src="/assets/{{ $kategori->nama }}.svg" class="max-h-full w-auto object-contain"
                                alt="{{ $kategori->nama }}">
                            <p class="mt-2 text-[#193a6f] text-[12px] font-semibold text-center">{{ $kategori->nama }}</p>
                        </div>
                    @endforeach

                    <!-- Spacer kanan -->
                    <div class="shrink-0 md:hidden" style="width: 5px;"></div>
                </div>
            </div>


            <h2 class="mt-6 text-[18px] md:text-[20px] font-semibold text-black px-5">Barang Temuan Terbaru</h2>
            <div class="mt-4 grid grid-cols-[repeat(auto-fit,minmax(160px,1fr))] gap-4 px-5">
                @foreach ($barangTemuan as $barang)
                    <x-barang-card :barang="$barang" />
                @endforeach
            </div>

            <h2 class="mt-6 text-[18px] md:text-[20px] font-semibold text-black px-5">Barang Hilang Terbaru</h2>
            <div class="mt-4 grid grid-cols-[repeat(auto-fit,minmax(160px,1fr))] gap-4 px-5">
                @foreach ($barangHilang as $barang)
                    <x-barang-card :barang="$barang" />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    });
</script>