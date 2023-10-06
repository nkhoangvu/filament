@props(['value', 'id', 'label' ])

<x-label value="{{ $label }}" for="{{ $id }}" />
<div class="input-group col-md-12" id="show_hide_password">
    <input type="password" id="{{$id}}" value="" class="form-control" name="{{$id}}"/>
    <div class="input-group-prepend">
        <span class="input-group-text"><a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
    </div>        
</div>