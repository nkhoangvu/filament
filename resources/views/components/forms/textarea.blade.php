@props(['value', 'label', 'id'])

<x-label value="{{ $label }}" />
<div class="form-group">
    <textarea class="form-control" id="{{$id}}" name="{{$id}}">{!! $value !!}</textarea>
</div>