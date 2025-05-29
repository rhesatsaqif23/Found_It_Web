<section>
    <header>
        <h2 class="text-[20px] font-semibold">Ubah Profil</h2>
        <p class="mt-1 text-[14px] md:text-[16px] text-gray-600">Perbarui informasi akun kamu di bawah ini.</p>
    </header>

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-5 mt-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label for="name" class="block text-[16px] font-semibold text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                class="w-full border rounded-[10px] px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#193a6f] text-[14px]" />
            @error('name')
                <p class="text-[14px] text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Username --}}
        <div>
            <label for="username" class="block text-[16px] font-semibold text-gray-700 mb-1">Username</label>
            <input type="text" name="username" id="username" value="{{ old('username', auth()->user()->username) }}"
                class="w-full border rounded-[10px] px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#193a6f] text-[14px]" />
            @error('username')
                <p class="text-[14px] text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-[16px] font-semibold text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                class="w-full border rounded-[10px] px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#193a6f] text-[14px]" />
            @error('email')
                <p class="text-[14px] text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- No Telepon --}}
        <div>
            <label for="no_telepon" class="block text-[16px] font-semibold text-gray-700 mb-1">No. Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon', auth()->user()->no_telepon) }}"
                class="w-full border rounded-[10px] px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#193a6f] text-[14px]" />
            @error('no_telepon')
                <p class="text-[14px] text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-center gap-3">
            <button type="submit"
                class="px-5 py-2 rounded-[10px] bg-[#193a6f] text-white text-[16px] font-semibold shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</section>
