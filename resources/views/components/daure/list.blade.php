<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.daure_ds') }}</h3>
            </div>
            <div class="card-body">
                <table id="mainTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="20%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
                            <th width="10%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
                            <th width="25%" class="text-center">{{ trans('ngkhoa.ngaysinh_al') }}</th>
                            <th width="20%" class="text-center">{{ trans('ngkhoa.phoingau') }}</th> 
                            <th width="10%" class="text-center">{{ trans('ngkhoa.phoingau_ten') }}</th> 
                            <th width="15%" class="text-center">{{ trans('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td width="23%"class="text-center"><x-giapha.ten :data="$item" /></td>
                            <td width="10%" class="text-center"><x-giapha.gioitinh :data="$item" /></td>
                            <td width="25%" class="text-center">{{ $item->NgaySinhAL }}</td>
                            <td width="22%" class="text-center">
                                @if(isset($item->phoingau))
                                <a href="{{ route('nguoi.show', [$item->phoingau->nguoi->MaNguoi]) }}">
                                    <x-giapha.ten :data="$item->phoingau->nguoi" />  ({{$item->phoingau->nguoi->MaNhanh}}/{{$item->phoingau->nguoi->MaDoi}})
                                </a>
                                @endif
                            </td>
                            <td width="10%" class="text-center">@if(isset($item->phoingau)){{$item->phoingau->loaiphoingau->TenLoaiPhoiNgau}}@endif</td>
                            <td width="10%" class="text-center">
                                <x-buttons.index-edit :route="'daure.edit'" :id="$item->MaDauRe" />
                                <x-buttons.index-delete :route="'daure.delete'" :id="$item->MaDauRe" />
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="20%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
                            <th width="10%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
                            <th width="25%" class="text-center">{{ trans('ngkhoa.ngaysinh_al') }}</th>
                            <th width="20%" class="text-center">{{ trans('ngkhoa.phoingau') }}</th> 
                            <th width="10%" class="text-center">{{ trans('ngkhoa.phoingau_ten') }}</th> 
                            <th width="15%" class="text-center">{{ trans('common.action') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>