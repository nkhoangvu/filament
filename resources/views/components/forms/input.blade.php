@props(['value', 'label', 'readonly' => false, 'disabled' => false])

<label class="control-label">{{ $label }}</label>
<div class="input-group col-md-12">
    <input type="text" {!! $attributes->merge(['class' => 'form-control']) !!} value="{{ $value }}"  {{ $disabled ? 'disabled' : '' }} {{ $readonly ? 'readonly' : '' }} />
</div>