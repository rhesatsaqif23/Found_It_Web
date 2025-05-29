@php
    use Illuminate\Support\Str;
    use Carbon\Carbon;

    $foto = $barang->foto ?? '';
    $isUrl = Str::startsWith($foto, ['http://', 'https://']);
    $imageSrc = $foto
        ? ($isUrl ? $foto : asset('storage/' . $foto))
        : asset('assets/no_image.png');

    $waktu = $barang->waktu ? Carbon::parse($barang->waktu)->timezone('Asia/Jakarta') : null;

    $status = strtolower(trim($barang->status->nama ?? ''));
    $isSelesai = str_contains($status, 'sudah');
    $statusTampilan = $isSelesai ? 'Selesai' : ucwords($status ?: '-');
@endphp

<div class="relative">
    <a href="{{ route('barangs.show', $barang) }}" class="absolute inset-0 z-0"></a>
    <div
        class="w-full bg-white shadow rounded-[15px] flex sm:flex-row p-4 gap-4 sm:gap-6 items-start sm:items-center box-border overflow-hidden max-w-full sm:max-w-[100%] relative z-10 pointer-events-none">

        {{-- Gambar --}}
        <div class="w-[90px] sm:w-[130px] rounded-[15px] overflow-hidden shrink-0">
            <div class="w-full aspect-[1/1]">
                <img src="{{ $imageSrc }}" alt="{{ $barang->nama ?? 'Barang' }}"
                    class="w-full h-full object-cover object-center" />
            </div>
        </div>

        {{-- Info Barang --}}
        <div class="flex flex-col flex-1 min-w-0 gap-1 sm:gap-2 justify-center">
            <h3 class="text-[#193a6f] text-[15px] sm:text-[18px] font-semibold leading-tight truncate">
                {{ $barang->nama ?? '-' }}
            </h3>

            @if (!empty($barang->lokasi))
                <div class="flex items-center text-[13px] sm:text-[16px] text-[#6f6f6f] gap-1.5 sm:gap-2">
                    <img src="{{ asset('assets/lokasi_merah.svg') }}" class="w-[18px] sm:w-[22px] h-[18px] sm:h-[22px]"
                        alt="lokasi">
                    <span class="truncate">{{ $barang->lokasi }}</span>
                </div>
            @endif

            @if ($waktu)
                <div class="flex items-center text-[13px] sm:text-[16px] text-[#5d5d5d] gap-1.5 sm:gap-2">
                    <img src="{{ asset('assets/tanggal.svg') }}" class="w-[17px] sm:w-[21px] h-[17px] sm:h-[21px]"
                        alt="tanggal">
                    <span>{{ $waktu->format('d/m/Y - H:i') }}</span>
                </div>
            @endif

            {{-- Mobile only --}}
            <div class="flex items-center justify-between gap-2 sm:hidden">
                <p class="text-[13px] font-semibold {{ $isSelesai ? 'text-[#193a6f]' : 'text-[#c64a3e]' }}">
                    {{ $statusTampilan }}
                </p>
                <a href="{{ route('barangs.edit', $barang) }}"
                    class="flex items-center gap-1.5 px-1.5 py-1.5 rounded-[10px] bg-[#193a6f] text-white shadow text-[13px] font-medium whitespace-nowrap pointer-events-auto z-20">
                    <img src="{{ asset('assets/edit.svg') }}" class="w-[18px] h-[18px]" alt="edit">
                </a>
            </div>
        </div>

        {{-- Desktop only --}}
        <div class="hidden sm:flex flex-col items-end justify-between gap-4 shrink-0">
            <p class="text-[18px] font-semibold {{ $isSelesai ? 'text-[#193a6f]' : 'text-[#c64a3e]' }}">
                {{ $statusTampilan }}
            </p>

            <a href="{{ route('barangs.edit', $barang) }}"
                class="flex items-center gap-2 px-4 py-2 rounded-[10px] bg-[#193a6f] text-white shadow text-[16px] font-medium pointer-events-auto z-20">
                <img src="{{ asset('assets/edit.svg') }}" class="w-[20px] h-[20px]" alt="edit">
                Edit
            </a>
        </div>
    </div>
</div>