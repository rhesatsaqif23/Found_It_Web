<div class="w-[200px] bg-white shadow rounded-[15px] overflow-hidden">
  <a href="{{ route('barangs.show', $barang) }}">
    <img
      src="{{ $barang->foto }}"
      alt="{{ $barang->nama }}"
      class="w-full h-[150px] object-cover"
    />
    <div class="p-3">
      <h3 class="text-[14px] font-semibold text-[#193a6f] leading-snug line-clamp-2">
        {{ $barang->nama }}
      </h3>
      <div class="flex items-center text-[12px] text-gray-600 mt-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.5 1.5 0 01-2.121 0l-4.243-4.243a8 8 0 1111.314 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span class="line-clamp-1">{{ $barang->lokasi }}</span>
      </div>
      <div class="flex items-center text-[12px] text-gray-600 mt-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ $barang->waktu->diffForHumans() }}</span>
      </div>
    </div>
  </a>
</div>
