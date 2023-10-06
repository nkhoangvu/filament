@props(['data'])

@if(isset($data->TenDem))
{{$data->Ho}} {{$data->TenDem}} {{$data->Ten}}
@else
{{$data->Ho}} {{$data->Ten}}
@endif