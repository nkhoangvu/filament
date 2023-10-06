@props(['data', 'title'])

<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                  <h3 class="card-title">{{ $title }}</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">								
                    <div class="form-group col-md-8">
                        <x-forms.input :value="isset($data) ? $data->name : ''" :label="trans('common.name')" id="name" name="name" />		
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>