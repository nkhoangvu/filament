@props(['data'])

@switch($data->HuongTho)

    @case(-1)
        {{ trans('ngkhoa.matsom')}}
        @break

    @case(0)

        {{ trans('ngkhoa.khongro')}}
        @break

    @default
        {{ $data->HuongTho }} &nbsp;{{ trans('ngkhoa.tuoi')}}

@endswitch