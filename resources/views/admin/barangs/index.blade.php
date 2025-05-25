@section('title', 'Daftar Barang')

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
</x-app-layout>