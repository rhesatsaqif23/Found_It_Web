@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-[16px] text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>