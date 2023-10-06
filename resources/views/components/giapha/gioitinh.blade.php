@props(['data'])

@switch($data->GioiTinh)
    @case(1)
        {{ trans('ngkhoa.nam')}}
        @break
    @case(0)
        {{ trans('ngkhoa.nu')}}
        @break
    @default
        {{ trans('ngkhoa.khongro')}}
@endswitch