@section('title', 'Lapor Barang Hilang')

<x-app-layout>
    <div class="bg-[#f0f9ff] pt-20 sm:pt-28 md:pt-32 sm:pb-10 px-0 sm:px-4 md:px-[100px]">
        <div class="bg-white max-w-[1232px] sm:mx-8 md:mx-auto p-8 rounded-none sm:rounded-[20px] shadow">
            <h2 class="text-[28px] text-[#193a6f] font-bold font-['Poppins'] mb-2">Lapor Barang Hilang</h2>
            <p class="text-[16px] text-black font-normal font-['Poppins'] mb-4">
                Isi formulir berikut untuk melaporkan barang kamu yang hilang atau tertinggal di suatu tempat. Mohon
                lengkapi informasi secara jelas agar mempermudah proses pencarian dan verifikasi oleh pengguna lain.
            </p>
            <hr class="mb-6 border-[#b0b0b0]">

            <form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="nama" class="font-semibold text-[16px] text-black">Nama Barang</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1" required>
                </div>

                <div>
                    <label for="kategori_id" class="font-semibold text-[16px] text-black">Kategori</label>
                    <select name="kategori_id" id="kategori_id"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1" required>
                        <option value="">Pilih kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="waktu" class="font-semibold text-[16px] text-black">Waktu</label>
                    <input type="datetime-local" name="waktu" id="waktu"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1" value="{{ old('waktu') }}"
                        required>
                </div>

                <div>
                    <label for="lokasi" class="font-semibold text-[16px] text-black">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1" value="{{ old('lokasi') }}"
                        required>
                </div>

                <div>
                    <label for="deskripsi" class="font-semibold text-[16px] text-black">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1">{{ old('deskripsi') }}</textarea>
                </div>

                <div>
                    <label for="kontak" class="font-semibold text-[16px] text-black">Kontak</label>
                    <input type="text" name="kontak" id="kontak"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1" value="{{ old('kontak') }}"
                        required>
                </div>

                <div>
                    <label for="foto" class="font-semibold text-[16px] text-black">Foto Barang</label>
                    <input type="file" name="foto" id="foto"
                        class="w-full border border-[#b0b0b0] rounded-[10px] px-4 py-2 mt-1" required>
                </div>

                {{-- Hidden input untuk status_id dan tipe_id --}}
                <input type="hidden" name="status_id" value="{{ $status->id }}">
                <input type="hidden" name="tipe_id" value="{{ $tipe->id }}">

                <div class="w-full sm:max-w-sm sm:mx-auto">
                    <button type="submit"
                        class="w-full bg-[#f98125] text-white px-6 py-2 rounded-[10px] font-bold shadow hover:bg-[#d96f1f]">
                        Kirim Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>