@props(['value','placeholder'])

<label {{ $attributes->merge(['class' => 'block font-medium text-lg text-gray-700 ']) }}>
    {{ $value ?? $slot }}
</label>
