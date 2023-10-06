@props(['data', 'categories', 'authors', 'tags'])

<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.thongtin')}}</h3>
            </div>
            <div class="card-body">	
                <div class="row">	
                    <div class="form-group col-md-12">
                        <x-forms.input id="title" name="title" :value="isset($data) ? $data->title : ''" :label="trans('common.title')" />
                    </div>
                </div>
                <div class="row">	
                    <div class="form-group col-md-8">
                        <x-forms.select :data="$categories" :value="isset($data) ? $data->category_id : ''" :label="trans('common.category')" name="category_id" id="category" />
                    </div>
                    <div class="form-group col-md-4">
                        <x-forms.input-date name="created_at" :value="isset($data) ? $data->date : ''" :id="'created_at'" :label="trans('common.date')" />
                    </div>
                    @role('user')
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    @endrole
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="control-label col">{{ trans('common.content') }}</label>
                        <div id="editor" class="form-group">
                            <textarea class="form-control" id="editor1" name="content">@if(isset($data)){!! $data->content !!}@endif</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">	
                    <div class="form-group col-md-12">
                        <x-forms.select-multi :data="$tags" :value="isset($data) ? $data->tags : null" :label="trans('common.tag')" id="tags" name="tags[]" multiple/>			    
                    </div>
                </div>	
                @role('super-admin|admin')
                <div class="row">
                    <div class="form-group col-md-12">
                        <x-forms.select id="author" name="user_id" :data="$authors" :value="isset($data) ? $data->user_id : auth()->user()->id" :label="trans('common.author')" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <x-forms.input-check :value="isset($data) ? $data->published : ''" :label="trans('common.published')" id="published" name="published"/>
                    </div>
                </div>		
                @endrole
            </div>
        </div>
    </div>
</div>

@isset($data)
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('common.gallery') }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            
            @if($data->getMedia('article')->isNotEmpty())
            <div class="card-body">	
                <div class="row">
                    @foreach ($data->getMedia('article') as $item)
                    <div class="form-group col-md-4">
                        <p class="text-center">
                            <a href="{{$item->getUrl()}}" class="image-box">
                                <img src="{{$item->getUrl('preview')}}" sizes="(max-width: 320px) 100vw, 270px" width="270" alt="{{$item->getCustomProperty('title')}}" title="{{$item->getCustomProperty('title')}}">
                            </a>
                        </p>
                        <p class="text-center">
                            <a class="btn btn-sm btn-danger" onclick="return confirm('{{ trans('common.action_confirm')}}');" href="{{ route('baiviet.img-del', [ 'post_id'=>$data->id,'id'=>$item->id]) }}">
                                <i class="fa-solid fa-trash-can"></i>&nbsp;{{ trans('common.delete')}}
                            </a>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="card-footer text-right">	
                <div class="btn-group col-md-2" role="group">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#imageModal" >
                        <i class="nav-icon fa-regular fa-image"></i>{{ trans('common.image_upload')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset

<x-backend.seo :data="isset($data) ? $data : null" />