{{-- @section('title', 'Hasil Pencarian')

<x-app-layout>
    <div class="bg-[#f0f9ff] pt-28 pb-10 px-[25px] md:px-[100px]">
        <div class="max-w-[1512px] mx-auto flex flex-col md:flex-row gap-[40px]">
            <!-- Sidebar filter -->
            <aside class="bg-white shadow rounded-[10px] p-5 w-full max-w-[220px] hidden md:flex flex-col gap-4">
                <div>
                    <h3 class="text-[#193a6f] text-[16px] font-semibold font-poppins">Kategori</h3>
                    <ul class="mt-2 space-y-2">
                        @foreach($kategoris as $kategori)
                        <li class="flex items-center gap-2">
                            <input type="checkbox" class="form-checkbox" id="kategori-{{ $kategori->id }}">
                            <label for="kategori-{{ $kategori->id }}"
                                class="text-[14px] text-[#193a6f] font-medium font-poppins">
                                {{ $kategori->nama }}
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="text-[#193a6f] text-[16px] font-semibold font-poppins">Waktu</h3>
                </div>
                <div>
                    <h3 class="text-[#193a6f] text-[16px] font-semibold font-poppins">Lokasi</h3>
                </div>
                <div>
                    <h3 class="text-[#193a6f] text-[16px] font-semibold font-poppins">Urutkan</h3>
                </div>
            </aside>

            <!-- Hasil -->
            <section class="flex-1">
                <div class="flex gap-8 justify-center border-b border-gray-300 mb-6">
                    <a href="{{ route('barangs.cari', ['q' => request('q'), 'tipe' => 'Temuan']) }}">
                        <div
                            class="flex flex-col items-center {{ $tipeFilter === 'Temuan' ? 'text-[#2c599d]' : 'text-[#b0b0b0]' }}">
                            <p class="text-[18px] font-bold font-poppins">Temuan</p>
                            <div
                                class="h-[3px] w-full {{ $tipeFilter === 'Temuan' ? 'bg-[#2c599d]' : 'bg-[#b0b0b0]' }} mt-1">
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('barangs.cari', ['q' => request('q'), 'tipe' => 'Hilang']) }}">
                        <div
                            class="flex flex-col items-center {{ $tipeFilter === 'Hilang' ? 'text-[#2c599d]' : 'text-[#b0b0b0]' }}">
                            <p class="text-[18px] font-bold font-poppins">Hilang</p>
                            <div
                                class="h-[3px] w-full {{ $tipeFilter === 'Hilang' ? 'bg-[#2c599d]' : 'bg-[#b0b0b0]' }} mt-1">
                            </div>
                        </div>
                    </a>
                </div>

                <h2 class="text-[18px] md:text-[20px] font-semibold text-black mb-4">
                    Hasil untuk: <span class="text-[#2c599d]">"{{ request('q') }}"</span>
                </h2>

                @if($barangs->count())
                <div class="grid grid-cols-[repeat(auto-fit,minmax(160px,1fr))] gap-4">
                    @foreach($barangs as $barang)
                    <x-barang-card :barang="$barang" />
                    @endforeach
                </div>
                @else
                <div class="text-center text-gray-500 font-poppins text-sm">
                    Tidak ada hasil untuk pencarian ini.
                </div>
                @endif
            </section>
        </div>
    </div>
</x-app-layout> --}}

@section('title', 'Hasil Pencarian')

<x-app-layout>
    <div class="min-h-screen bg-[#f0f9ff]">
        <div class="max-w-[1512px] mx-auto pt-24 md:pt-28 pb-8 md:px-[50px] lg:px-[100px] px-4 sm:px-6">
            <div class="flex flex-col md:flex-row gap-[40px] items-start">

                {{-- Sidebar Filter --}}
                <aside class="bg-white shadow rounded-[10px] p-5 w-full max-w-[220px] hidden md:block">
                    <div class="mb-4">
                        <h3 class="text-[#193a6f] text-[16px] font-semibold font-poppins">Kategori</h3>
                        <ul class="mt-2 space-y-2">
                            @foreach($kategoris as $kategori)
                                <li class="flex items-center gap-2">
                                    <input type="checkbox" class="form-checkbox" id="kategori-{{ $kategori->id }}">
                                    <label for="kategori-{{ $kategori->id }}"
                                        class="text-[14px] text-[#193a6f] font-medium font-poppins">
                                        {{ $kategori->nama }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-[#193a6f] text-[16px] font-semibold font-poppins">Waktu</h3>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-[#193a6f] text-[16px] font-semibold font-poppins">Lokasi</h3>
                    </div>
                    <div>
                        <h3 class="text-[#193a6f] text-[16px] font-semibold font-poppins">Urutkan</h3>
                    </div>
                </aside>

                {{-- Hasil Pencarian --}}
                <section class="flex-1 w-full">
                    {{-- Tab Filter Tipe --}}
                    <div class="flex gap-8 justify-center lg:justify-start mb-4 flex-wrap md:justify-start">
                        @php
                            $tabClass = 'flex flex-col items-center min-w-[120px] px-2';
                            $activeTab = 'text-[#2c599d] font-bold border-b-[3px] border-[#2c599d]';
                            $inactiveTab = 'text-[#b0b0b0] font-semibold border-b-[3px] border-transparent';
                        @endphp

                        <a href="{{ route('barangs.cari', ['q' => request('q'), 'tipe' => 'Temuan']) }}"
                            class="{{ $tabClass }} {{ $tipeFilter === 'Temuan' ? $activeTab : $inactiveTab }}">
                            <span class="text-[18px] font-poppins">Temuan</span>
                        </a>

                        <a href="{{ route('barangs.cari', ['q' => request('q'), 'tipe' => 'Hilang']) }}"
                            class="{{ $tabClass }} {{ $tipeFilter === 'Hilang' ? $activeTab : $inactiveTab }}">
                            <span class="text-[18px] font-poppins">Hilang</span>
                        </a>
                    </div>

                    {{-- Judul Hasil --}}
                    <h2 class="text-[16px] md:text-[18px] font-semibold text-black mb-4">
                        Hasil untuk: <span class="text-[#2c599d]">{{ request('q') }}</span>
                    </h2>

                    {{-- Daftar Barang --}}
                    @if($barangs->count())
                        <div class="grid gap-4 sm:gap-5 md:gap-6 grid-cols-[repeat(auto-fill,minmax(160px,1fr))]">
                            
                            @foreach($barangs as $barang)
                                <x-barang-card :barang="$barang" />
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-gray-500 font-poppins text-sm mt-6">
                            Tidak ada hasil untuk pencarian ini.
                        </div>
                    @endif

                </section>
            </div>
        </div>
    </div>
</x-app-layout>