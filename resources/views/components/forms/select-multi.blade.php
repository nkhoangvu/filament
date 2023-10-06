@props(['data', 'value', 'label'])

<x-label value="{{ $label }}" />
<div class="input-group col-md-12">
    <select multiple="multiple" {!! $attributes->merge(['class' => 'form-control']) !!} placeholder="{{ trans('common.select_option') }}">
        @foreach($data as $item)
        <option value="{{ $item->name }}" @if(isset($value) && $value->contains('name', $item->name)) selected @endif>
            {{ $item->name }} @if(isset($item->description)) | {{$item->description}} @endif
        </option>
        @endforeach
    </select>
</div>