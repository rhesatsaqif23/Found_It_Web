@section('title', 'Edit Laporan')

<x-app-layout>
    <div class="bg-[#f0f9ff] pt-20 sm:pt-28 md:pt-32 sm:pb-10 px-0 sm:px-4 md:px-[100px]">
        <div class="bg-white max-w-[1232px] sm:mx-8 md:mx-auto p-8 rounded-none sm:rounded-[20px] shadow">
            <h2 class="text-[28px] text-[#193a6f] font-bold font-['Poppins'] mb-2">Edit Barang</h2>
            <p class="text-[16px] text-black font-normal font-['Poppins'] mb-4">
                Perbarui informasi barang berikut agar informasi tetap akurat dan memudahkan proses pencarian atau
                pengambilan barang.
            </p>
            <hr class="mb-6 border-[#b0b0b0]">

            <form method="POST" action="{{ route('barangs.update', $barang->id) }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nama" class="font-semibold text-[16px] text-black">Nama Barang</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $barang->nama) }}"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1" required>
                    <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                </div>

                <div>
                    <label for="kategori_id" class="font-semibold text-[16px] text-black">Kategori</label>
                    <select name="kategori_id" id="kategori_id"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1" required>
                        <option value="">Pilih kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('kategori_id')" />
                </div>

                <div>
                    <label for="waktu" class="font-semibold text-[16px] text-black">Waktu</label>
                    <input type="datetime-local" name="waktu" id="waktu"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1"
                        value="{{ old('waktu', \Carbon\Carbon::parse($barang->waktu)->format('Y-m-d\TH:i')) }}"
                        required>
                    <x-input-error class="mt-2" :messages="$errors->get('waktu')" />
                </div>

                <div>
                    <label for="lokasi" class="font-semibold text-[16px] text-black">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1"
                        value="{{ old('lokasi', $barang->lokasi) }}" required>
                    <x-input-error class="mt-2" :messages="$errors->get('lokasi')" />
                </div>

                <div>
                    <label for="kontak" class="font-semibold text-[16px] text-black">Kontak</label>
                    <input type="text" name="kontak" id="kontak"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1"
                        value="{{ old('kontak', $barang->kontak) }}" required>
                    <x-input-error class="mt-2" :messages="$errors->get('kontak')" />
                </div>

                <div>
                    <label for="deskripsi" class="font-semibold text-[16px] text-black">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                </div>

                <div>
                    <label class="font-semibold text-[16px] text-black block mb-1">Foto Barang</label>

                    @php
                        $foto = $barang->foto ?? '';
                        $isUrl = \Illuminate\Support\Str::startsWith($foto, ['http://', 'https://']);
                        $imageSrc = $foto
                            ? ($isUrl ? $foto : asset('storage/' . $foto))
                            : asset('assets/no_image.png');
                    @endphp

                    <img src="{{ $imageSrc }}" alt="Foto Barang" class="w-32 h-32 object-cover rounded mb-2">
                </div>

                <div>
                    <label for="foto" class="font-semibold text-[16px] text-black">Upload Foto Baru</label>
                    <input type="file" name="foto" id="foto"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1" accept="image/*">
                    <x-input-error class="mt-2" :messages="$errors->get('foto')" />
                </div>

                {{-- Hidden input untuk status_id dan tipe_id --}}
                <input type="hidden" name="status_id" value="{{ $barang->status_id }}">
                <input type="hidden" name="tipe_id" value="{{ $barang->tipe_id }}">

                {{-- Tombol Simpan --}}
                <div class="w-full sm:max-w-sm sm:mx-auto pt-4">
                    <button type="submit"
                        class="w-full bg-[#f98125] text-white px-6 py-2 rounded-[10px] font-bold shadow hover:bg-[#d96f1f]">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

            {{-- Tombol Selesaikan --}}
            @php
                $statusNama = strtolower($barang->status->nama ?? '');
                $labelSelesai = str_contains($statusNama, 'belum ditemukan') ? 'Tandai Sudah Ditemukan' :
                    (str_contains($statusNama, 'belum dikembalikan') ? 'Tandai Sudah Dikembalikan' : null);
            @endphp

            @if ($labelSelesai)
                <form method="POST" action="{{ route('barangs.selesaikan', $barang->id) }}" class="mt-6">
                    @csrf
                    @method('PUT')
                    <div class="w-full sm:max-w-sm sm:mx-auto">
                        <button type="submit"
                            class="w-full bg-[#193a6f] text-white px-6 py-2 rounded-[10px] font-bold shadow hover:bg-[#10274e]">
                            {{ $labelSelesai }}
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>