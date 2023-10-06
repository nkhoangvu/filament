@props(['data', 'Cha', 'Me', 'DauRe'])

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.chong_vo') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="input-group col">
                            <input type="hidden" name="MaNguoi" value="{{$data->MaNguoi}}" />
                            <x-forms.input :label="trans('ngkhoa.nguoi')" disabled="true" readonly="true">
                                <x-slot name="value">
                                    <x-giapha.ten :data="isset($data) ? $data : ''" />
                                </x-slot>
                            </x-forms.input>                                    
                        </div>
                    </div>
                    <div class="form-group col">
                        <x-forms.input :label="trans('ngkhoa.cha')" disabled="true" readonly="true">
                            <x-slot name="value">
                                <x-giapha.ten :data="isset($data) ? $data->cha : ''" />
                            </x-slot>
                        </x-forms.input>
                    </div>
                    <div class="form-group col">
                        <x-forms.input :label="trans('ngkhoa.me')" disabled="true" readonly="true">
                            <x-slot name="value">
                                <x-giapha.ten :data="isset($data) ? $data->me : ''" />
                            </x-slot>
                        </x-forms.input>
                    </div>
                    <div class="form-group col">
                        <x-forms.select-kieuphoingau />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($data->daure->isNotEmpty())
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.phoingau') }}</h3>
            </div>
            <div class="card-body">
                <table id="phoingauTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="25%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
                            <th width="10%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
                            <th width="30%" class="text-center">{{ trans('ngkhoa.ngaysinh_al') }}</th>
                            <th width="20%" class="text-center">{{ trans('ngkhoa.phoingau_ten') }}</th> 
                            <th width="15%" class="text-center">{{ trans('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->daure as $item)
                        <tr>
                            <td width="25%"class="text-center">
                                <a href="{{ route('daure.edit', ['id'=>$item->MaDauRe]) }}">
                                    <x-giapha.ten :data="$item" />
                                </a>
                            </td>
                            <td width="10%" class="text-center"><x-giapha.gioitinh :data="$item" /></td>
                            <td width="30%" class="text-center">{{ $item->NgaySinhAL }}</td>
                            <td width="20%" class="text-center">{{$item->phoingau->loaiphoingau->TenLoaiPhoiNgau}}</td>
                            <td width="15%" class="text-center">
                                <a class="btn btn-sm btn-warning" href="{{ route('phoingau.delete', [$item->phoingau->MaPhoiNgau]) }}">
                                    <i class="fa-solid fa-person-rays"></i>&nbsp;{{ trans('ngkhoa.phoingau_huy')}}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-12">
        <div class="callout callout-danger">
            <h5><i class="fa-solid fa-triangle-exclamation"></i> {{ trans('ngkhoa.hientai') }}:</h5>
            <p class="text-danger">{{ trans('ngkhoa.phoingau_khong') }}</p>
        </div>
    </div>
</div>
@endif
@if ($DauRe->isNotEmpty())
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.hoten') }}</h3>
            </div>
            <div class="card-body">
                <table id="daureTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="30%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
                            <th width="15%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
                            <th width="35%" class="text-center">{{ trans('ngkhoa.ngaysinh_al') }}</th>
                            <th width="20%" class="text-center">{{ trans('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($DauRe as $item)
                        <tr>
                            <td width="30%"class="text-center"><x-giapha.ten :data="$item" /></td>
                            <td width="15%" class="text-center"><x-giapha.gioitinh :data="$item" /></td>
                            <td width="35%" class="text-center">{{ $item->NgaySinhAL }}</td>
                            <td width="20%" class="text-center">
                                <button class="btn btn-sm btn-primary" name="MaDauRe" type="submit" value="{{$item->MaDauRe}}"><i class="fa-solid fa-people-arrows"></i>&nbsp;{{ trans('ngkhoa.phoingau_them') }}</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="30%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
                            <th width="15%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
                            <th width="35%" class="text-center">{{ trans('ngkhoa.ngaysinh_al') }}</th>
                            <th width="20%" class="text-center">{{ trans('common.action') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-12">
        <div class="callout callout-danger">
            <h5><i class="fa-solid fa-triangle-exclamation"></i> {{ trans('ngkhoa.thongbao') }}:</h5>
            <p class="text-danger">{{ trans('ngkhoa.daure_khong') }}</p>
        </div>
    </div>
</div>
@endif