@props(['data', 'phoingau'])

<p class="text-danger"><strong><i class="fas fa-heart mr-1"></i> {{ $phoingau }} @if($data->GioiTinh == 1) {{ trans('ngkhoa.cua') }} @endif </strong></p>
<h4><strong><x-giapha.ten :data="$data" /></strong>
    @hasRoleAndOwns('user', $data)            
    <a href="{{ route('family.daureEdit', [$data->daure->MaDauRe]) }}" title="{{trans('common.edit')}}">
        <i class="fa-regular fa-pen-to-square"></i>
    </a>
    @endOwns
    
</h4>

<ul>
    @if (isset($data->TenCha))
    <li><b>{{ trans('ngkhoa.cha') }}:</b> {{$data->TenCha}}</li>
    @endif
    @if (isset($data->TenMe))
    <li><b>{{ trans('ngkhoa.me') }}:</b> {{$data->TenMe}}</li>
    @endif
    @if (isset($data->QueQuan))
    <li><b>{{ trans('ngkhoa.quequan') }}:</b> {{$data->QueQuan}}</li>
    @endif
    @if (isset($data->PhongTang))
        <li><b>{{ trans('ngkhoa.phongtang') }}:</b> {{$data->PhongTang}}</li>
    @endif
    @if (isset($data->ChucVi))
    <li><b>{{ trans('ngkhoa.chucvi') }}:</b> {{$data->ChucVi}}</li>
    @endif
    @if (isset($data->ThuyHieu))
        <li><b>{{ trans('ngkhoa.thuyhieu') }}:</b> {{$data->ThuyHieu}}</li>
    @endif

    @if (isset($data->PhapDanh))
        <li><b>{{ trans('ngkhoa.phapdanh') }}:</b> {{$data->PhapDanh}}</li>
    @endif
    
    @if (isset($data->NgaySinhDL) || isset($data->NgaySinhAL))
    <li>
        <b>{{ trans('ngkhoa.ngaysinh') }}:</b> 
        {{formatDate($data->NgaySinhDL)}} <br />
        {{$data->NgaySinhAL}}
    </li>
    @endif    
    
    @if(isset($data->NgayMatDL) || isset($data->NgayMatAL))
    <li>
        <b>{{ trans('ngkhoa.ngaymat') }}:</b>
            {{formatDate($data->NgayMatDL)}} <br />
            {{$data->NgayMatAL}}    
    </li>
    @endif
    
    @if(isset($data->HuongTho))
        <li><b>{{ trans('ngkhoa.huongtho') }}:</b>  <x-giapha.huongtho :data="$data" /> </li>
    @endif

    @if (isset($data->MaMoTang))
    <li><b>{{ trans('ngkhoa.motang') }}:</b> 
        {{$data->KieuMoTang}} - {{$data->NoiMoTang}} </li>
    @endif
</ul>                     