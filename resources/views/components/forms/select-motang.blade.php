@props(['data', 'value'])

<x-label :value="trans('ngkhoa.motang')" />
<div class="input-group col-md-12">
    <select id="MoTang" name="MaMoTang" class="form-control">
        <option value="">{{ trans('ngkhoa.chon_motang') }}</option>
        @foreach($data as $item)
            <option value="{{$item->MaMoTang}}" @if(isset($value) && $value == $item->MaMoTang) selected @endif>{{$item->TenKieuMoTang}} - {{$item->NoiMoTang}} </option>									
        @endforeach
    </select>
</div>
