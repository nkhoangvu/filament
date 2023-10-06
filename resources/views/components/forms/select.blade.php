@props(['data', 'value', 'label'])

<x-label value="{{ $label }}" />
<div class="input-group col-md-12">
    <select {!! $attributes->merge(['class' => 'form-control']) !!}>
        <option value="" disabled selected hidden>{{ trans('common.select_option') }}</option>
        @foreach($data as $item)
            <option value="{{ $item->id }}" @if(isset($value) && $item->id == $value) selected @endif>
                {{ $item->name }} @if(isset($item->description)) | {{$item->description}} @endif
            </option>
        @endforeach
    </select>      
</div>
