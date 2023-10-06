<div class="row">
    <div class="form-group col-md-4">
        <input type="hidden" name="MaNguoi" value="{{$data->MaNguoi}}" />
        <x-forms.input disabled="true" readonly="true" :label="trans('ngkhoa.nguoi')">
            <x-slot name="value">
                <x-giapha.ten-doi :data="$data" />
            </x-slot>
        </x-forms.input>
    </div>
    @if($data->MaNguoi > 1)
    <div class="form-group col">
        <x-forms.input disabled="true" readonly="true" :label="trans('ngkhoa.cha')">
            <x-slot name="value">
                <x-giapha.ten :data="$data->cha" />
            </x-slot>
        </x-forms.input>
    </div>
    <div class="form-group col">
        <x-forms.input disabled="true" readonly="true" :label="trans('ngkhoa.me')">
            <x-slot name="value">
                <x-giapha.ten :data="$data->me" />
            </x-slot>
        </x-forms.input>
    </div>
    @endif
</div>