@props(['value', 'label'])

<div class="form-check">
    <input type="checkbox"  {!! $attributes->merge(['class' => 'form-check-input']) !!} @if($value == 1) checked @endif>
    <label class="control-label col">{{ $label }}</label>
</div>