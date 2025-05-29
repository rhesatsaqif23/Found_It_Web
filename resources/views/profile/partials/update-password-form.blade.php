<section>
    <header>
        <h2 class="text-[20px] font-semibold">Ubah Password</h2>
        <p class="mt-1 text-[14px] md:text-[16px] text-gray-600">
            Gunakan password yang panjang dan acak agar akun kamu tetap aman.
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-5 mt-4">
        @csrf
        @method('PUT')

        {{-- Password Saat Ini --}}
        <div>
            <label for="current_password" class="block text-[16px] font-semibold text-gray-700 mb-1">Password Saat Ini</label>
            <input type="password" name="current_password" id="current_password" autocomplete="current-password"
                class="w-full border rounded-[10px] px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#193a6f] text-[14px]" />
            @if ($errors->updatePassword->has('current_password'))
                <p class="text-[14px] text-red-500 mt-1">{{ $errors->updatePassword->first('current_password') }}</p>
            @endif
        </div>

        {{-- Password Baru --}}
        <div>
            <label for="password" class="block text-[16px] font-semibold text-gray-700 mb-1">Password Baru</label>
            <input type="password" name="password" id="password" autocomplete="new-password"
                class="w-full border rounded-[10px] px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#193a6f] text-[14px]" />
            @if ($errors->updatePassword->has('password'))
                <p class="text-[14px] text-red-500 mt-1">{{ $errors->updatePassword->first('password') }}</p>
            @endif
        </div>

        {{-- Konfirmasi Password --}}
        <div>
            <label for="password_confirmation" class="block text-[16px] font-semibold text-gray-700 mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password"
                class="w-full border rounded-[10px] px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#193a6f] text-[14px]" />
            @if ($errors->updatePassword->has('password_confirmation'))
                <p class="text-[14px] text-red-500 mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="flex items-center justify-center gap-3">
            <button type="submit"
                class="px-5 py-2 rounded-[10px] bg-[#193a6f] text-white text-[16px] font-semibold shadow">
                Simpan Password
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-[14px] text-green-600">Password berhasil diperbarui.</p>
            @endif
        </div>
    </form>
</section>
