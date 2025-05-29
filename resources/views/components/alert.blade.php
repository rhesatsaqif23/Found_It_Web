@props(['type' => 'success', 'message' => ''])

@if ($message)
    <div x-data="{ show: false }" x-init="show = true; setTimeout(() => show = false, 3000)" x-show="show"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed top-24 md:top-32 left-1/2 transform -translate-x-1/2 z-50 w-[90%] sm:w-[400px]
                   bg-white border-l-4 border-[#193a6f] text-[#193a6f] p-4 rounded-[10px] shadow-md">
        <div class="flex items-center justify-between">
            <span class="text-sm sm:text-base font-medium">{{ $message }}</span>
            <button @click="show = false" class="ml-4 text-xl leading-none">&times;</button>
        </div>
    </div>
@endif