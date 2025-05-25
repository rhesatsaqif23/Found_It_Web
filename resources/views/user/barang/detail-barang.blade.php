@section('title', 'Detail Barang')

<x-app-layout>
    <div class="bg-[#f0f9ff] pt-0 sm:pt-32 pb-0 sm:pb-12 px-0 sm:px-12 md:px-20">
        <div
            class="bg-white sm:rounded-[20px] shadow-md p-0 sm:p-8 sm:px-[50px] flex flex-col lg:flex-row gap-8 lg:gap-16 max-w-[1200px] mx-auto">

            {{-- Gambar dan tombol hubungi --}}
            @php
                $foto = $barang->foto ?? '';
                $isUrl = \Illuminate\Support\Str::startsWith($foto, ['http://', 'https://']);
                $imageSrc = $foto
                    ? ($isUrl ? $foto : asset('storage/' . $foto))
                    : asset('assets/no_image.png');
            @endphp


            <div class="mt-20 sm:mt-3 w-full lg:w-1/2 lg:max-w-[450px]">
                <div class="aspect-[1/1] overflow-hidden sm:rounded-[20px]">
                    <img src="{{ $imageSrc }}" alt="{{ $barang->nama ?? 'Barang' }}"
                        class="w-full h-full object-cover object-center sm:rounded-[20px]" />
                </div>

                {{-- Tombol hanya tampil di desktop --}}
                <div class="hidden lg:block mt-8">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $barang->kontak) }}" target="_blank"
                        class="bg-[#f98125] text-white font-bold text-[14px] sm:text-[16px] py-2 px-4 rounded-[10px] w-full text-center block">
                        Hubungi Pelapor
                    </a>
                </div>
            </div>

            {{-- Detail informasi --}}
            <div class="flex-1 flex flex-col w-full text-sm sm:text-base px-6 sm:px-0 max-w-[566px] mx-auto sm:mx-0">
                {{-- Nama & tipe --}}
                <div>
                    <h1 class="text-[#193a6f] text-[24px] sm:text-[28px] font-bold">{{ $barang->nama }}</h1>
                    <p class="my-5 text-[#5d5d5d] text-[14px] sm:text-[16px] font-medium">Barang
                        {{ $barang->tipe->nama ?? '-' }}
                    </p>
                </div>

                {{-- Kategori --}}
                <div class="border-t border-gray-300 py-4">
                    <p class="font-semibold text-black">Kategori</p>
                    <div class="flex items-center gap-3 mt-3">
                        <img src="{{ asset('assets/kategori.svg') }}" class="w-[25px] h-[25px]" alt="Kategori">
                        <p>{{ $barang->kategori->nama ?? '-' }}</p>
                    </div>
                </div>

                {{-- Status --}}
                <div class="border-t border-gray-300 py-4">
                    <p class="font-semibold text-black">Status</p>
                    <div class="flex items-center gap-3 mt-3">
                        <img src="{{ asset('assets/status.svg') }}" class="w-[25px] h-[25px]" alt="Status">
                        <p>{{ $barang->status->nama ?? '-' }}</p>
                    </div>
                </div>

                {{-- Waktu ditemukan (tanggal) --}}
                <div class="border-t border-gray-300 py-4">
                    <p class="font-semibold text-black">Waktu Ditemukan</p>
                    <div class="flex items-center gap-3 mt-3">
                        <img src="{{ asset('assets/tanggal.svg') }}" class="w-[25px] h-[25px]" alt="Tanggal">
                        <p>{{ $tanggal }}</p>
                    </div>
                </div>

                {{-- Jam --}}
                <div class="pb-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/jam.svg') }}" class="w-[25px] h-[25px]" alt="Jam">
                        <p>Dilaporkan pada {{ $jam }}</p>
                    </div>
                </div>

                {{-- Lokasi --}}
                <div class="border-t border-gray-300 py-4">
                    <p class="font-semibold text-black">Lokasi Ditemukan</p>
                    <div class="flex items-center gap-3 mt-3">
                        <img src="{{ asset('assets/lokasi_abu.svg') }}" class="w-[25px] h-[25px]" alt="Lokasi">
                        <p>{{ $barang->lokasi }}</p>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="border-t border-gray-300 py-4">
                    <p class="font-semibold text-black">Deskripsi</p>
                    <div class="flex items-center gap-3 mt-3">
                        <img src="{{ asset('assets/deskripsi.svg') }}" class="w-[25px] h-[25px]" alt="Deskripsi">
                        <p>{{ $barang->deskripsi }}</p>
                    </div>
                </div>

                {{-- Kontak Pelapor --}}
                <div class="border-t border-gray-300 py-4">
                    <p class="font-semibold text-black">Kontak Pelapor</p>
                    <div class="flex items-center gap-3 mt-3">
                        <img src="{{ asset('assets/nama_pelapor.svg') }}" class="w-[25px] h-[25px]" alt="Nama Pelapor">
                        <p>{{ $barang->pelapor->name ?? '-' }}</p>
                    </div>
                </div>

                {{-- Nomor kontak --}}
                <div class="pb-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/kontak_pelapor.svg') }}" class="w-[25px] h-[25px]" alt="Kontak">
                        <p>{{ $barang->kontak }}</p>
                    </div>
                </div>

                {{-- Tombol hanya tampil di mobile --}}
                <div class="block lg:hidden mt-4 mb-8 sm:mb-4">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $barang->kontak) }}" target="_blank"
                        class="bg-[#f98125] text-white font-bold text-[14px] sm:text-[16px] py-2 px-4 rounded-[10px] w-full text-center block">
                        Hubungi Pelapor
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>