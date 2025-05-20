@section('title', 'Dashboard')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-center">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">Selamat Datang di <span class="text-indigo-600">Found It!</span></h1>
                    <p class="text-gray-600 mb-6">Temukan atau laporkan barang hilang dengan cepat dan mudah.</p>
                    <div class="space-x-4">
                        <a href="{{ route('barangs.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded">
                            Lihat Daftar Barang
                        </a>
                        @auth
                            <a href="{{ route('barangs.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
                                Buat Laporan
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                                Login untuk Buat Laporan
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Tentang Aplikasi</h2>
                <p class="text-gray-600 leading-relaxed">
                    <strong>Found It</strong> adalah platform pelaporan dan pencarian barang hilang. Pengguna dapat membuat laporan barang hilang atau ditemukan, melihat daftar barang, serta menghubungi pemilik jika barang ditemukan.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
