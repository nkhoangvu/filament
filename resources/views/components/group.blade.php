@props(['data'])

<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('common.info') }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input id="name" name="name" :value="isset($data) ? $data->name : ''" :label="trans('common.name')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="description" name="description" :value="isset($data) ? $data->description : ''" :label="trans('common.description')" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>