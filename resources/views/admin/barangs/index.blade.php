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
  <div class="bg-[#f0f9ff]">
    <div class="max-w-[1512px] mx-auto px-[100px] pt-[25px]">
      <div class="flex justify-between gap-[70px]">
        <div class="bg-[url('/assets/banner-lost.png')] bg-cover rounded-[30px] w-1/2 p-[50px] text-white">
          <h1 class="text-[32px] font-extrabold leading-tight tracking-widest">Kehilangan barang?</h1>
          <p class="text-[20px] font-bold tracking-wide">Temukan atau laporkan dengan mudah!</p>
          <a href="{{ route('barangs.create') }}" class="inline-block mt-4 px-[15px] py-2 bg-[#f98125] rounded-[10px] text-white font-bold">Lapor Sekarang</a>
        </div>
        <div class="bg-[url('/assets/banner-point.png')] bg-cover rounded-[30px] w-1/2 p-[50px] text-white">
          <h1 class="text-[32px] font-extrabold leading-tight tracking-widest">Tukar poin menjadi uang!</h1>
          <p class="text-[20px] font-bold tracking-wide">Kembalikan barang milik orang lain dan raih poin</p>
          <a href="#" class="inline-block mt-4 px-[15px] py-2 bg-[#2c599d] rounded-[10px] text-white font-bold">Tukarkan Poin</a>
        </div>
      </div>

      <h2 class="mt-12 text-[24px] font-semibold text-black">Kategori Barang</h2>
      <div class="mt-4 flex flex-wrap gap-3">
        @foreach ($kategoris as $kategori)
          <div class="bg-white shadow rounded-[10px] w-[122px] flex flex-col items-center py-2">
            <img src="/assets/{{ $kategori->ikon }}" class="h-[60px] object-contain">
            <p class="text-[#193a6f] text-[12px] font-semibold">{{ $kategori->nama }}</p>
          </div>
        @endforeach
      </div>

      <h2 class="mt-12 text-[24px] font-semibold text-black">Barang Temuan Terbaru</h2>
      <div class="mt-4 flex flex-wrap gap-4">
        @foreach ($barangTemuan as $barang)
          <x-barang-card :barang="$barang" />
        @endforeach
      </div>

      <h2 class="mt-12 text-[24px] font-semibold text-black">Barang Hilang Terbaru</h2>
      <div class="mt-4 flex flex-wrap gap-4">
        @foreach ($barangHilang as $barang)
          <x-barang-card :barang="$barang" />
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
