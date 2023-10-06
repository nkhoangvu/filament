@props(['value', 'readonly' => false, 'disabled' => false])

<x-label :value="trans('common.email')" />
<div class="input-group col-md-12">
    <div class="input-group-prepend">
        <span class="input-group-text">@</span>
    </div>
    <input id="email" name="email" type="text" {!! $attributes->merge(['class' => 'form-control']) !!} @if(isset($value)) value="{{ $value }}" @endif {{ $disabled ? 'disabled' : '' }} {{ $readonly ? 'readonly' : '' }}>
</div>