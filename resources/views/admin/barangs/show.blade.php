@section('title', 'Detail Barang')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Barang: {{ $barang->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-3">
                    <p><strong>Tipe:</strong> {{ $barang->tipe->nama ?? '-' }}</p>
                    <p><strong>Kategori:</strong> {{ $barang->kategori->nama ?? '-' }}</p>
                    <p><strong>Lokasi:</strong> {{ $barang->lokasi }}</p>
                    <p><strong>Waktu:</strong> {{ $barang->waktu }}</p>
                    <p><strong>Pelapor:</strong> {{ $barang->pelapor->name ?? '-' }}</p>
                    <p><strong>Kontak:</strong> {{ $barang->kontak }}</p>
                    <p><strong>Deskripsi:</strong> {{ $barang->deskripsi }}</p>
                    <p><strong>Status:</strong> {{ $barang->status->nama ?? '-' }}</p>

                    @if ($barang->foto)
                        <div>
                            <strong>Foto:</strong><br>
                            <img src="{{ $barang->foto }}" alt="Foto Barang" class="w-64 h-auto mt-2">
                        </div>
                    @endif

                    <a href="{{ route('barangs.index') }}">
                        <x-primary-button class="mt-4">Kembali</x-primary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>