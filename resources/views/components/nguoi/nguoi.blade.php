@props(['data', 'Cha', 'MoTang', 'MaDoi'])

@if(!isset($data) || $data->MaNguoi != 1)
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.chame') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="hidden" name="MaCha" value="{{$Cha->MaNguoi}}" />
                        <x-forms.input id="MaCha" name="MaCha" :label="trans('ngkhoa.cha')" disabled="true" readonly="true">
                            <x-slot name="value">
                                <x-giapha.ten :data="isset($Cha) ? $Cha : ''" />
                            </x-slot>
                        </x-forms.input>
                    </div>
                    <div class="form-group col-md-6">
                        <x-forms.select-me :data="$Cha->daure" :value="isset($data) ? $data->MaMe : ''" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.phahe') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">                        
                    <div class="form-group col md-4">
                        <x-forms.input id="ConThu" name="ConThu" :value="isset($data) ? $data->ConThu : ''" :label="trans('ngkhoa.con')" placeholder="{{ trans('ngkhoa.con_thu')}}" />
                    </div>
                    <div class="form-group col md-4">
                        <x-forms.input id="MaDoi" name="MaDoi" :label="trans('ngkhoa.doi')" :value="isset($data) ? $data->MaDoi : $MaDoi" readonly="true" />
                    </div>
                    <div class="form-group col md-4">
                        <x-forms.select-nhanh :value="isset($data) ? $data->MaNhanh : ''" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ trans('ngkhoa.phahe') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">                        
                <div class="form-group col">
                    <x-forms.input id="MaDoi" name="MaDoi" :label="trans('ngkhoa.doi')" :value="isset($data) ? $data->MaDoi : ''" readonly="true" />
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.hoten') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input :label="trans('ngkhoa.ho')" value="Nguyễn Khoa" disabled="true" readonly="true" />
                    </div>
                    <div class="form-group col-md-3">
                        <x-forms.input id="TenDem" name="TenDem" :value="isset($data) ? $data->TenDem : ''" :label="trans('ngkhoa.tendem')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="Ten" name="Ten" :value="isset($data) ? $data->Ten : ''" :label="trans('ngkhoa.ten')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="TenKhac" name="TenKhac" :value="isset($data) ? $data->TenKhac : ''" :label="trans('ngkhoa.tenkhac')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <x-forms.select-gioitinh :value="isset($data) ? $data->GioiTinh : ''"/>
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="PhapDanh" name="PhapDanh" :value="isset($data) ? $data->PhapDanh : ''" :label="trans('ngkhoa.phapdanh')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input id="TenHuy" name="TenHuy" :value="isset($data) ? $data->TenHuy : ''" :label="trans('ngkhoa.tenhuy')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="TenTu" name="TenTu" :value="isset($data) ? $data->TenTu : ''" :label="trans('ngkhoa.tentu')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input id="TenHieu" name="TenHieu" :value="isset($data) ? $data->TenHieu : ''" :label="trans('ngkhoa.tenhieu')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="ThuyHieu" name="ThuyHieu" :value="isset($data) ? $data->ThuyHieu : ''" :label="trans('ngkhoa.thuyhieu')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input-file :value="isset($data) ? $data->ChanDung : ''" :label="trans('ngkhoa.chandung')" id="ChanDung" name="ChanDung" />			
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row"> 
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.sinh_tu') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">                        
                    <div class="form-group col">
                        <x-forms.input-date id="NgaySinhDL" :value="isset($data) ? $data->NgaySinhDL : ''" :label="trans('ngkhoa.ngaysinh')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="NgaySinhAL" name="NgaySinhAL" :value="isset($data) ? $data->NgaySinhAL : ''" :label="trans('ngkhoa.ngaysinh_al')" />
                    </div>
                </div>
                <div class="row">                        
                    <div class="form-group col">
                        <x-forms.input id="NoiSinh" name="NoiSinh" :value="isset($data) ? $data->NoiSinh : ''" :label="trans('ngkhoa.noisinh')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="QueQuan" name="QueQuan" :value="isset($data) ? $data->QueQuan : ''" :label="trans('ngkhoa.quequan')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input-date id="NgayMatDL" :value="isset($data) ? $data->NgayMatDL : ''" :label="trans('ngkhoa.ngaymat')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="NgayMatAL" name="NgayMatAL" :value="isset($data) ? $data->NgayMatAL : ''" :label="trans('ngkhoa.ngaymat_al')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input id="HuongTho" name="HuongTho" :value="isset($data) ? $data->HuongTho : ''" :label="trans('ngkhoa.huongtho')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.select-motang :data="$MoTang" :value="isset($data) ? $data->MaMoTang : ''" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>