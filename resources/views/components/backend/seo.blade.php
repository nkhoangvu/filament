@props(['data'])

<div class="row">
    <div class="col-12">
        <div class="card card-success" id="seo">
            <div class="card-header">
                  <h3 class="card-title">SEO</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">	
                    <div class="form-group col-md-12">
                        <x-forms.input :value="isset($data) ? $data->seo->title : ''" :label="trans('common.title')" id="seo_title" name="seo_title" />			    
                    </div>
                </div>
                <div class="row">	
                    <div class="form-group col-md-12">
                        <x-forms.input :value="isset($data) ? $data->seo->description : ''" :label="trans('common.description')" id="seo_description" name="seo_description" />			    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>