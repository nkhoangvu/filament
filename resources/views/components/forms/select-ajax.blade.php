@props(['label', 'id'])

<x-label :value="$label" for="{{$id}}"/>
<div class="input-group col-md-12">
    <select id="{{$id}}" name="{{$id}}" class="form-control">
        <option value="">{{ trans('common.selectoption')}}</option>
        <!-- Populate MaNhanh options dynamically using Ajax -->
    </select>
</div>
