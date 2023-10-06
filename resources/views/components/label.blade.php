@props(['value'])

<label {{ $attributes->merge(['class' => 'control-label col']) }}>
    {{ $value ?? $slot }}
</label>