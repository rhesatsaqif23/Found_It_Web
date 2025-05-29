@section('title', 'Riwayat Laporan')

<x-app-layout>
    <div class="min-h-screen w-full bg-[#f0f9ff] px-6 sm:px-8 md:px-10 lg:px-[100px] overflow-x-hidden">
        <div class="max-w-[1512px] mx-auto pt-24 md:pt-28 pb-8">
            <div class="flex flex-col md:flex-row gap-[40px] items-start w-full">
                <div class="flex flex-col md:flex-row gap-[40px] items-start w-full">

                    {{-- Sidebar Filter --}}
                    <aside class="bg-white shadow rounded-[10px] p-5 w-full max-w-[220px] hidden lg:block">
                        <form method="GET" action="{{ route('barangs.riwayat') }}">
                            <h3 class="text-[#193a6f] text-[16px] font-semibold font-poppins">Filter Status</h3>
                            <ul class="mt-2 space-y-2">
                                @php
                                    $selectedStatus = request('status', []);
                                @endphp
                                @foreach (['Belum Dikembalikan', 'Belum Ditemukan', 'Selesai'] as $status)
                                    <li>
                                        <label class="flex items-center gap-2 text-[14px] text-[#193a6f] font-medium">
                                            <input type="checkbox" class="form-checkbox" name="status[]" value="{{ $status }}"
                                                {{ in_array($status, $selectedStatus) ? 'checked' : '' }}>
                                            {{ $status }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>

                            <button type="submit"
                                class="mt-4 w-full text-white bg-[#193a6f] hover:bg-[#142e56] py-2 rounded-md font-poppins text-sm font-medium">
                                Terapkan Filter
                            </button>
                        </form>
                    </aside>

                    {{-- Konten Utama --}}
                    <section class="flex-1 w-full">
                        <h2 class="text-[18px] md:text-[20px] font-semibold text-black mb-4 font-poppins">
                            Riwayat Laporan Anda
                        </h2>

                        @if ($barangs->count())
                            <div class="flex flex-col gap-4 sm:gap-5 w-full overflow-hidden">
                                @foreach ($barangs as $barang)
                                    <x-riwayat-card :barang="$barang" />
                                @endforeach
                            </div>
                        @else
                            <div class="text-center text-gray-500 font-poppins text-sm mt-6">
                                Anda belum membuat laporan barang.
                            </div>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>