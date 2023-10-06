@props(['data', 'MoTang'])

<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.hoten') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input id="Ho" name="Ho" :value="isset($data) ? $data->Ho : ''" :label="trans('ngkhoa.ho')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="TenDem" name="TenDem" :value="isset($data) ? $data->TenDem : ''" :label="trans('ngkhoa.tendem')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="Ten" name="Ten" :value="isset($data) ? $data->Ten : ''" :label="trans('ngkhoa.ten')" />
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
                        <x-forms.input id="TenKhac" name="TenKhac" :value="isset($data) ? $data->TenKhac : ''" :label="trans('ngkhoa.tenkhac')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="ThuyHieu" name="ThuyHieu" :value="isset($data) ? $data->ThuyHieu : ''" :label="trans('ngkhoa.thuyhieu')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="PhapDanh" name="PhapDanh" :value="isset($data) ? $data->PhapDanh : ''" :label="trans('ngkhoa.phapdanh')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input id="ChucVi" name="ChucVi" :value="isset($data) ? $data->ChucVi : ''" :label="trans('ngkhoa.chucvi')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="PhongTang" name="PhongTang" :value="isset($data) ? $data->PhongTang : ''" :label="trans('ngkhoa.phongtang')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input id="TenCha" name="TenCha" :value="isset($data) ? $data->TenCha : ''" :label="trans('ngkhoa.cha')" placeholder="{{ trans('ngkhoa.nhap_hoten')}}" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="TenMe" name="TenMe" :value="isset($data) ? $data->TenMe : ''" :label="trans('ngkhoa.me')" placeholder="{{ trans('ngkhoa.nhap_hoten')}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.sinh_tu') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">                        
                    <div class="form-group col">
                        <x-forms.input-date id="NgaySinhDL" :value="isset($data) ? formatDate($data->NgaySinhDL) : ''" :label="trans('ngkhoa.ngaysinh')" />
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
                        <x-forms.input-date id="NgayMatDL" :value="isset($data) ? formatDate($data->NgayMatDL) : ''" :label="trans('ngkhoa.ngaymat')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="NgayMatAL" name="NgayMatAL" :value="isset($data) ? $data->NgayMatAL : ''" :label="trans('ngkhoa.ngaymat_al')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <x-forms.select-gioitinh :value="isset($data) ? $data->GioiTinh : ''"/>
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="HuongTho" name="HuongTho" :value="isset($data) ? $data->HuongTho : ''" :label="trans('ngkhoa.huongtho')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <x-forms.select-motang :data="$MoTang" :value="isset($data) ? $data->MaMoTang : ''" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>