@props(['data'])

<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                  <h3 class="card-title">{{ trans('common.list') }}</h3>
            </div>
            <div class="card-body">
                <table id="mainTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="20%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
                            <th width="10%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
                            <th width="10%" class="text-center">{{ trans('ngkhoa.doi') }}</th>
                            <th width="10%" class="text-center">{{ trans('ngkhoa.nhanh') }}</th> 
                            <th width="25%" class="text-center">{{ trans('ngkhoa.ngaysinh_al') }}</th> 
                            <th width="25%" class="text-center">{{ trans('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td width="20%"class="text-center">
                                <a href="{{ route('nguoi.show', ['id'=>$item->MaNguoi]) }}">
                                    <x-giapha.ten :data="$item" />
                                </a>
                            </td>
                            <td width="10%" class="text-center">
                                <x-giapha.gioitinh :data="$item" />
                            </td>
                            <td width="10%" class="text-center">{{$item->MaDoi}}</td>
                            <td width="10%" class="text-center">{{$item->MaNhanh}}</td>
                            <td width="25%" class="text-center">{{$item->NgaySinhAL}}</td>
                            <td width="25%" class="text-center">
                                <x-buttons.index-edit :route="'nguoi.edit'" :id="$item->MaNguoi" />
                                @if($item->GioiTinh == 1)
                                    <x-buttons.index-create :route="'nguoi.create'" :id="$item->MaNguoi" />											
                                @else
                                    <x-buttons.index-create :route="'ngoai.create'" :id="$item->MaNguoi" />
                                @endif
                                <x-buttons.index-spouse :id="$item->MaNguoi" />
                                <x-buttons.index-chucvi :id="$item->MaNguoi" />
                                <x-buttons.index-phongtang :id="$item->MaNguoi" />
                                <x-buttons.index-link :id="$item->MaNguoi" />
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="20%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
                            <th width="10%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
                            <th width="10%" class="text-center">{{ trans('ngkhoa.doi') }}</th>
                            <th width="10%" class="text-center">{{ trans('ngkhoa.nhanh') }}</th> 
                            <th width="25%" class="text-center">{{ trans('ngkhoa.ngaysinh_al') }}</th> 
                            <th width="25%" class="text-center">{{ trans('common.action') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>