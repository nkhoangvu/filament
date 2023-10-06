    
@props(['value'])

<label class="control-label">{{ trans('ngkhoa.phoingau_ten')}}</label>
<div class="input-group col-md-12">
    <select id="LoaiPhoiNgau" name="MaLoaiPhoiNgau" class="form-control">
        <datalist>
            <option value="">{{ trans('ngkhoa.chon_tenphoingau')}}</option>
            <option value="1" @if(isset($value) && $value == 1) selected @endif>{{ trans('ngkhoa.chanhthat')}}</option>
            <option value="2" @if(isset($value) && $value == 2) selected @endif>{{ trans('ngkhoa.kethat')}}</option>
            <option value="3" @if(isset($value) && $value == 3) selected @endif>{{ trans('ngkhoa.thuthat')}}</option>
            <option value="4" @if(isset($value) && $value == 4) selected @endif>{{ trans('ngkhoa.tracthat')}}</option>
            <option value="5" @if(isset($value) && $value == 5) selected @endif>{{ trans('ngkhoa.ythat')}}</option>
        </datalist>
    </select>
</div>