@if(isset ($errors) && count($errors) > 0)
<div class="row">
        <div class="col-12">
                <div class="callout callout-success">
                        <h5><i class="fa-solid fa-triangle-exclamation"></i>  {{ trans('common.error')}}::</h5>
                        @foreach($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                        @endforeach
                </div>
        </div>
</div> 
@endif

@if ($message = Session::get('success')) 
        @if (is_array($message))
        <div class="row">
                <div class="col-12">
                        <div class="callout callout-success">
                                <h5><i class="fas fa-info"></i> {{ trans('common.note')}}:</h5>
                                @foreach ($message as $item)
                                        <p class="text-success">{{ $item }}</p>
                                @endforeach
                        </div>
                </div>
        </div>         
        @else
                <div class="row">
                        <div class="col-12">
                                <div class="callout callout-success">
                                        <h5><i class="fas fa-info"></i> {{ trans('common.note')}}:</h5>
                                        <p class="text-success">{{ $message }}</p>
                                </div>
                        </div>
                </div>         
        @endif
                               
        @elseif ($message = Session::get('failed')) 
        <div class="row">
                <div class="col-12">
                        <div class="callout callout-danger">
                                <h5><i class="fa-solid fa-triangle-exclamation"></i> Error:</h5>
                                <p class="text-danger">{{ $message }}</p>
                        </div>
                </div>
        </div>         
        @endif
