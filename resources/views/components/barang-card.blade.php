@php
    use Illuminate\Support\Str;

    $foto = $barang->foto ?? '';
    $isUrl = Str::startsWith($foto, ['http://', 'https://']);
    $imageSrc = $foto
        ? ($isUrl ? $foto : asset('storage/' . $foto))
        : asset('assets/no_image.png');
@endphp

<div class="w-full bg-white shadow rounded-[15px] overflow-hidden">
    <a href="{{ route('barangs.show', $barang) }}">
        <div class="w-full aspect-[1/1] overflow-hidden">
            <img src="{{ $imageSrc }}" alt="{{ $barang->nama ?? 'Barang' }}"
                class="w-full h-full object-cover object-center" />
        </div>
        <div class="p-3">
            <h3 class="text-[14px] font-semibold text-[#193a6f] leading-snug line-clamp-2">
                {{ $barang->nama ?? '-' }}
            </h3>
            @if (!empty($barang->lokasi))
                <div class="flex items-center text-[12px] text-gray-600 mt-1">
                    <img src="{{ asset('assets/lokasi_merah.svg') }}" class="w-4 h-4 mr-1" alt="lokasi">
                    <span class="line-clamp-1">{{ $barang->lokasi }}</span>
                </div>
            @endif

            @if (!empty($barang->waktu))
                <div class="flex items-center text-[12px] text-gray-600 mt-1">
                    <img src="{{ asset('assets/waktu.svg') }}" class="w-4 h-4 mr-1" alt="waktu">
                    <span>{{ \Carbon\Carbon::parse($barang->waktu)->diffForHumans() }}</span>
                </div>
            @endif
        </div>
    </a>
</div>