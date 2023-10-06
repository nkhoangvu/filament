@props(['value'])

<div class="row">
    <div class="col-md-12">
        <div class="callout callout-danger">
            <h5><i class="fa-solid fa-triangle-exclamation"></i> {{ trans('ngkhoa.thongbao') }}:</h5>
            <p class="text-danger">{{ $value }}</p>
        </div>
    </div>
</div>