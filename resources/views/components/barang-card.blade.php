<div class="w-full bg-white shadow rounded-[15px] overflow-hidden">
    <a href="{{ route('barangs.show', $barang) }}">
        <div class="w-full aspect-[1/1] overflow-hidden">
            <img src="{{ $barang->foto }}" alt="{{ $barang->nama }}" class="w-full h-full object-cover object-center" />
        </div>
        <div class="p-3">
            <h3 class="text-[14px] font-semibold text-[#193a6f] leading-snug line-clamp-2">
                {{ $barang->nama }}
            </h3>
            <div class="flex items-center text-[12px] text-gray-600 mt-1">
                <img src="../assets/lokasi_merah.svg" class="w-4 h-4 mr-1" alt="lokasi">
                <span class="line-clamp-1">{{ $barang->lokasi }}</span>
            </div>
            <div class="flex items-center text-[12px] text-gray-600 mt-1">
                <img src="../assets/waktu.svg" class="w-4 h-4 mr-1" alt="waktu">
                <span>{{ $barang->waktu->diffForHumans() }}</span>
            </div>
        </div>
    </a>
</div>