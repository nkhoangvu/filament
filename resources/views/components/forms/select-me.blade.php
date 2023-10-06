@props(['data', 'value'])

<x-label :value="trans('ngkhoa.me')" />
<div class="input-group col-md-12">
    <select id="MaMe" name="MaMe" class="form-control">
        <option value="">{{ trans('ngkhoa.chon_me')}}</option>
        @foreach($data as $item)
            <option value="{{$item->MaDauRe}}" @if($item->MaDauRe == $value) selected @endif>
                <x-giapha.ten :data="$item" />
            </option>									
        @endforeach
    </select>
</div>
