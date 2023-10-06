@props(['value', 'id', 'label'])

<div class="form-group col">
    <label class="control-label">{{ $label }}</label>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="{{$id}}" name="{{$id}}" />
      <label class="custom-file-label">@if(isset($value)) {{ $value }} @else {{ trans('common.choose_file') }} @endif</label>
    </div>
</div>