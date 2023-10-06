@props(['data'])

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('common.info') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <x-forms.input id="TenChucVi" name="TenChucVi" :value="isset($data) ? $data->TenChucVi : ''" :label="trans('ngkhoa.chucvi')" />
                    </div>
                    <div class="form-group col-md-6">
                        <x-forms.input id="ThoiDiem" name="ThoiDiem" :value="isset($data) ? $data->ThoiDiem : ''" :label="trans('ngkhoa.thoidiem')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <x-forms.input id="GhiChu" name="GhiChu" :value="isset($data) ? $data->GhiChu : ''" :label="trans('ngkhoa.diengiai')" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>