@props(['data', 'page', 'title'])

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
                        <x-forms.input :value="$page->title" :label="trans('common.page')" id="page_title" name="page_title" disabled="true" />
                        <input type="text" id="page_id" class="form-control" name="page_id" hidden value="@if(isset($data)) {{ $data->page_id }} @else {{$page->id}} @endif"/>
                    </div>
                    <div class="form-group col-md-4">
                        <x-forms.input :value="isset($data) ? $data->dis_order : ''" :label="trans('common.dis_order')" id="dis_order" name="dis_order" />
                    </div>
                </div>
                <div class="row">	
                    <div class="form-group col-md-12">
                        <x-forms.input :value="isset($data) ? $data->title : ''" :label="trans('common.title')" id="title" name="title" />
                    </div>
                </div>
                <div class="row">	
                    <div class="form-group col-md-2">
                        <x-forms.input-check :value="isset($data) ? $data->title_enable : ''" :label="trans('common.title_enable')" id="title_enable" name="title_enable"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <x-label :value="trans('common.content')" />
                        <div id="editor" class="form-group">
                            <textarea class="form-control" id="editor1" name="paragraph">@isset($data){!! $data->paragraph !!}@endisset</textarea>
                        </div>
                    </div>
                </div>		
            </div>
        </div>
    </div>
</div>