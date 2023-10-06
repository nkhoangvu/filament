@props(['data', 'Me'])

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.chame') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="hidden" name="MaMe" value="{{$Me->MaNguoi}}" />
                        <x-forms.input :label="trans('ngkhoa.me')" disabled="true" readonly="true">
                            <x-slot name="value">
                                <x-giapha.ten :data="isset($Me) ? $Me : ''" />
                            </x-slot>
                        </x-forms.input>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label col">{{ trans('ngkhoa.cha')}}</label>
                        <select id="MaMe" name="MaCha" class="form-control">
                            <option value="">{{ trans('ngkhoa.chon_cha') }}</option>
                            @foreach($Me->daure as $item)
                                <option value="{{$item->MaDauRe}}" @if($item->MaDauRe == $data->MaCha) selected @endif><x-giapha.ten :data="$item" /></option>									
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <x-forms.input id="ConThu" name="ConThu" :value="isset($data) ? $data->ConThu : ''" :label="trans('ngkhoa.con')" placeholder="{{ trans('ngkhoa.con_thu')}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.hoten') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <x-forms.input id="Ho" name="Ho" :value="isset($data) ? $data->Ho : ''" :label="trans('ngkhoa.ho')" />
                    </div>
                    <div class="form-group col-md-4">
                        <x-forms.input id="TenDem" name="TenDem" :value="isset($data) ? $data->TenDem : ''" :label="trans('ngkhoa.tendem')" />
                    </div>
                    <div class="form-group col-md-4">
                        <x-forms.input id="Ten" name="Ten" :value="isset($data) ? $data->Ten : ''" :label="trans('ngkhoa.ten')" />
                    </div>
                </div>
                <div class="row">                        
                    <div class="form-group col-md-4">
                        <x-forms.select-gioitinh :value="isset($data) ? $data->GioiTinh : ''"/>
                    </div>
                    <div class="form-group col-md-8">
                        <x-forms.input-date id="NgaySinhDL" :value="isset($data) ? $data->NgaySinhDL : ''" :label="trans('ngkhoa.ngaysinh')" />
                    </div>
                </div>
                <div class="row">                        
                    <div class="form-group col">
                        <x-forms.input id="NgaySinhAL" name="NgaySinhAL" :value="isset($data) ? $data->NgaySinhAL : ''" :label="trans('ngkhoa.ngaysinh_al')" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.khac') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">          
                    <div class="form-group col">
                        <x-forms.input id="ChucVi" name="ChucVi" :value="isset($data) ? $data->ChucVi : ''" :label="trans('ngkhoa.chucvi')" />
                    </div>                     
                    <div class="form-group col">
                        <x-forms.input id="LienKet" name="LienKet" :value="isset($data) ? $data->LienKet : ''" :label="trans('ngkhoa.lienket')" />
                    </div>              
                </div>
                <div class="row">          
                    <div class="form-group col">
                        <x-forms.input id="GhiChu" name="GhiChu" :value="isset($data) ? $data->GhiChu : ''" :label="trans('ngkhoa.ghichu')" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
