@props(['value'])

<label class="control-label col">{{ trans('ngkhoa.gioitinh')}}</label>
<div class="input-group col-md-12">
    <select id="gioitinh" name="GioiTinh" class="form-control">
        <option value="">{{ trans('ngkhoa.chon_gioitinh')}}</option>
        <option value="0"  @if(isset($value) && $value == 0) selected @endif>{{ trans('ngkhoa.nu')}}</option>
        <option value="1" @if(isset($value) && $value == 1) selected @endif>{{ trans('ngkhoa.nam')}}</option>
        <option value="2" @if(isset($value) && $value == 2) selected @endif>{{ trans('ngkhoa.khongro')}}</option>
    </select>
</div>

