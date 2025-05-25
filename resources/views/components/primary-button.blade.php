<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-3 bg-[#F98125] border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#e0701e] focus:bg-[#e0701e] active:bg-[#c96317] focus:outline-none focus:ring-2 focus:ring-[#F98125] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
