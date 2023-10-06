@props(['data', 'nguoi'])

<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.thongtin')}}</h3>
            </div>
            <div class="card-body">
                <div class="row">	
                    <div class="form-group col-md-4">
                        <label>{{ trans('ngkhoa.nguoi')}}</label>
                        <div class="col-md-12">
                            <select id="MaNguoi" name="MaNguoi" class="form-control" placeholder="{{ trans('ngkhoa.nguoi')}}">
                                <option value="">{{ trans('common.chonnguoi')}}</option>
                                @foreach($nguoi as $item)
                                    <option value="{{$item->MaNguoi}}" @if(isset($data) && $item->MaNguoi == $data->MaNguoi) selected @endif>
                                        <x-giapha.ten :data="$item" /> ({{ $item->MaNhanh }}/{{ $item->MaDoi }})
                                    </option>									
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-8">
                        <x-forms.input id="TenLienKet" name="TenLienKet" :value="isset($data) ? $data->TenLienKet : ''" :label="trans('common.link_name')" />
                    </div>
                </div>
                <div class="row">	
                    <div class="form-group col-md-12">
                        <x-forms.input id="URL" name="URL" :value="isset($data) ? $data->URL : ''" :label="trans('common.url')" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>