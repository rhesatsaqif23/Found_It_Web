<section class="space-y-6">
    <header>
        <h2 class="text-[24px] font-semibold">Hapus Akun</h2>
        <p class="mt-1 text-[14px] md:text-[16px] text-gray-600">
            Setelah akun dihapus, semua data akan terhapus secara permanen.
        </p>
    </header>

    {{-- Tombol buka konfirmasi modal --}}
    <div class="flex justify-center">
        <button onclick="document.getElementById('confirmDeleteModal').classList.remove('hidden')"
            class="px-5 py-2 rounded-[10px] bg-[#c64a3e] text-white text-md font-semibold shadow">
            Hapus Akun
        </button>
    </div>

    {{-- Modal Konfirmasi --}}
    <div id="confirmDeleteModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center hidden">
        <div class="bg-white w-full max-w-md rounded-[15px] shadow-lg p-6 space-y-5">
            <h3 class="text-lg font-semibold text-[#c64a3e]">Yakin ingin menghapus akun?</h3>
            <p class="text-sm text-gray-600">
                Setelah akun dihapus, semua data akan hilang secara permanen. Masukkan password untuk konfirmasi.
            </p>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <div class="mb-4">
                    <label for="delete_password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="delete_password" placeholder="Masukkan Password"
                        class="w-full border rounded-[10px] px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#c64a3e]" />
                    @if ($errors->userDeletion->has('password'))
                        <p class="text-sm text-red-500 mt-1">{{ $errors->userDeletion->first('password') }}</p>
                    @endif
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button"
                        onclick="document.getElementById('confirmDeleteModal').classList.add('hidden')"
                        class="px-4 py-2 rounded-[10px] bg-gray-100 text-gray-800 text-sm font-medium">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-4 py-2 rounded-[10px] bg-[#c64a3e] text-white text-sm font-semibold shadow">
                        Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>