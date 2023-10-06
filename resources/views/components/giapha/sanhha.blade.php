@props(['data', 'item', 'child'])

<div class="ml-4">   
            
    @switch($data->GioiTinh)

    @case(1)
            @if (count($data->children->where('MaMe', $item->MaDauRe)) > 0)
            <p class="text-success"><strong><i class="fa-solid fa-person-breastfeeding"></i> {{ trans('ngkhoa.sanhha') }}</strong></p>
            <table class="table table-striped">
                <tbody>
                    @foreach ($data->children->sortBy('ConThu') as $con)
                        @if($con->MaMe == $item->MaDauRe)
                            <tr>    
                                <td width="20%">{{ trans('ngkhoa.con') }} {{ $con->ConThu }} </td>
                                <td width="30%">
                                    @if(Illuminate\Support\Facades\Route::is('nguoi.show'))
                                        <a href="{{ route('nguoi.show', ['id'=>$con->MaNguoi]) }}"><x-giapha.ten :data="$con" /></a>            
                                        @hasRoleAndOwns('user', $con)
                                        <a href="{{ route('family.nguoiEdit', [$data->MaNguoi]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                        @endOwns
                                    @else
                                        <a href="{{ route('nguoi.view', ['id'=>$con->MaNguoi]) }}"><x-giapha.ten :data="$con" /></a>
                                    @endif
                                </td>
                                <td width="15%">
                                    <x-giapha.gioitinh :data="$con" />
                                </td>
                                <td width="35%">
                                    @if(isset($con->HuongTho))
                                        @if($con->HuongTho < 0) 
                                            <i>({{ trans('ngkhoa.matsom')}}) </i> 
                                        @else
                                            {{ trans('ngkhoa.huongtho')}}&nbsp;{{$con->HuongTho}} &nbsp;{{ trans('ngkhoa.tuoi')}}
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach        
                </tbody>
            </table>
        @else
            <p class="font-weight-bold"><i class="fa-solid fa-circle-xmark"></i> {{ trans('ngkhoa.votu') }}</p>
        @endif  
        @break

    @case(0)   
        @if (count($data->ngoai->where('MaCha', $item->MaDauRe)) > 0)
            
            <p class="text-success"><strong><i class="fa-solid fa-person-breastfeeding"></i> {{ trans('ngkhoa.sanhha') }} </strong></p>
            <table class="table table-striped">
                <tbody>
                    @foreach ($data->ngoai->sortBy('ConThu') as $con)
                        @if($con->MaCha == $item->MaDauRe)
                            <tr>    
                                <td width="20%">{{ trans('ngkhoa.con') }} {{ $con->ConThu }} </td>
                                <td width="30%">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$con->ChucVi}}">
                                        <x-giapha.ten :data="$con" />
                                    </a>
                                </td>
                                <td width="15%">
                                    <x-giapha.gioitinh :data="$con" />
                                </td>
                                <td width="3%">
                                    {{$con->NgaySinh}}
                                </td>
                            </tr>
                        @endif
                    @endforeach        
                </tbody>
            </table>
        @else
            <p class="font-weight-bold"><i class="fa-solid fa-circle-xmark"></i> {{ trans('ngkhoa.votu') }}</p>
        @endif  
        @break

    @endswitch
</div>