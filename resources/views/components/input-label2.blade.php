@props(['value'])
<!--Color de labels del login y register-->
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black']) }}>
    {{ $value ?? $slot }}
</label>
