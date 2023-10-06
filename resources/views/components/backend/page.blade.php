@props(['data'])

<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('common.info')}}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">	
                    <div class="form-group col-md-8">
                        <x-forms.input id="title" name="title" :value="isset($data) ? $data->title : ''" :label="trans('common.title')" />
                    </div>
                    <div class="form-group col-md-4">
                        <x-forms.input id="slug" name="slug" :value="isset($data) ? $data->slug : ''" :label="trans('common.slug')" />
                    </div>
                </div>
                <div class="row">	
                    <div class="form-group col-md-12">
                        <x-forms.input id="intro" name="intro" :value="isset($data) ? $data->intro : ''" :label="trans('common.intro')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <x-forms.input-check :value="isset($data) ? $data->published : ''" :label="trans('common.published')" id="published" name="published"/>
                    </div>
                </div>	
            </div>
        </div>
    </div>
</div>
<x-backend.seo :data="isset($data) ? $data : null" />