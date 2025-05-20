@section('title', 'Edit Barang')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Barang
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pb-6 text-gray-900">
                    <form method="POST" action="{{ route('barangs.update', $barang) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="nama" value="Nama" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                                :value="old('nama', $barang->nama)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>

                        <div>
                            <x-input-label for="tipe_id" value="Tipe" />
                            <select name="tipe_id" id="tipe_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                                <option value="">-- Pilih Tipe --</option>
                                @foreach ($tipes as $tipe)
                                    <option value="{{ $tipe->id }}"
                                        {{ old('tipe_id', $barang->tipe_id) == $tipe->id ? 'selected' : '' }}>
                                        {{ $tipe->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('tipe_id')" />
                        </div>

                        <div>
                            <x-input-label for="kategori_id" value="Kategori" />
                            <select name="kategori_id" id="kategori_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('kategori_id')" />
                        </div>

                        <div>
                            <x-input-label for="waktu" value="Waktu" />
                            <x-text-input id="waktu" name="waktu" type="datetime-local" class="mt-1 block w-full"
                                :value="old('waktu', \Carbon\Carbon::parse($barang->waktu)->format('Y-m-d\TH:i'))" />
                            <x-input-error class="mt-2" :messages="$errors->get('waktu')" />
                        </div>

                        <div>
                            <x-input-label for="lokasi" value="Lokasi" />
                            <x-text-input id="lokasi" name="lokasi" type="text" class="mt-1 block w-full"
                                :value="old('lokasi', $barang->lokasi)" />
                            <x-input-error class="mt-2" :messages="$errors->get('lokasi')" />
                        </div>

                        <div>
                            <x-input-label for="kontak" value="Kontak" />
                            <x-text-input id="kontak" name="kontak" type="text" class="mt-1 block w-full"
                                :value="old('kontak', $barang->kontak)" />
                            <x-input-error class="mt-2" :messages="$errors->get('kontak')" />
                        </div>

                        <div>
                            <x-input-label for="deskripsi" value="Deskripsi" />
                            <textarea id="deskripsi" name="deskripsi" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                        </div>

                        <div>
                            <x-input-label for="foto" value="Foto (URL / Nama File)" />
                            <x-text-input id="foto" name="foto" type="text" class="mt-1 block w-full"
                                :value="old('foto', $barang->foto)" />
                            <x-input-error class="mt-2" :messages="$errors->get('foto')" />
                        </div>

                        <div>
                            <x-input-label for="status_id" value="Status" />
                            <select name="status_id" id="status_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                                <option value="">-- Pilih Status --</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}"
                                        {{ old('status_id', $barang->status_id) == $status->id ? 'selected' : '' }}>
                                        {{ $status->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('status_id')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>Simpan Perubahan</x-primary-button>
                            <a href="{{ route('barangs.index') }}">
                                <x-secondary-button>Kembali</x-secondary-button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
