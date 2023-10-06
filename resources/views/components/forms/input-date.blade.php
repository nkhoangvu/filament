@props(['value', 'id', 'label' ])

<x-label value="{{ $label }}" />
<div class="input-group col date" data-target-input="nearest" id="{{$id}}">
    <input type="text" {!! $attributes->merge(['class' => 'form-control datetimepicker-input']) !!} placeholder="dd/mm/YYYY" data-target="#{{ $id }}" value="{{ formatDate($value) }}" id="{{ $id }}" name="{{ $id }}" />
    <div class="input-group-append" data-target="#{{ $id }}" data-toggle="datetimepicker">
        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
    </div>
</div>