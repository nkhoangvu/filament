@props(['route', 'id', 'label'])

<a {!! $attributes->merge(['class' => 'btn btn-sm']) !!} href="{{ route($route, ['id'=>$id]) }}" title="{{ $label }}"><i class="fa-solid fa-people-arrows"></i></a>&nbsp;