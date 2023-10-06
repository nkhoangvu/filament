@props(['value'])

<x-label :value="trans('ngkhoa.nhanh')" />
<div class="input-group col-md-12">
    <select id="MaNhanh" name="MaNhanh" class="form-control">
        <option value="">{{ trans('ngkhoa.chon_nhanh')}}</option>
        <option value="1" @if(isset($value) && $value == 1) selected @endif>{{ trans('ngkhoa.nhanh1') }} </option>
        <option value="2" @if(isset($value) && $value == 2) selected @endif>{{ trans('ngkhoa.nhanh2') }} </option>
        <option value="3" @if(isset($value) && $value == 3) selected @endif>{{ trans('ngkhoa.nhanh3') }} </option>
        <option value="4" @if(isset($value) && $value == 4) selected @endif>{{ trans('ngkhoa.nhanh4') }} </option>
    </select>
</div>
