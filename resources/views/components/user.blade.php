@props(['data', 'group', 'role', 'role_id'])

<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('common.info')}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input id="name" name="name" :value="isset($data) ? $data->name : ''" :label="trans('common.name')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.select id="group" name="group_id" :data="$group" :value="isset($data) ? $data->group_id : ''" :label="trans('common.group')" />
                    </div>
                </div>					
                <div class="row">						
                    <div class="form-group col">
                        <x-forms.input-email :value="isset($data) ? $data->email : ''"/>
                    </div>
                    <div class="form-group col">
                        <x-forms.input id="username" name="username" :value="isset($data) ? $data->username : ''" :label="trans('common.username')" />
                    </div>					
                </div>
                @if(Illuminate\Support\Facades\Route::is('user.create'))
                <div class="row">
                    <div class="form-group col">
                        <x-forms.input-password id="password" :label="trans('common.password')" />
                    </div>
                    <div class="form-group col">
                        <x-forms.input-password id="confirm" :label=" trans('common.confirm_password')" />
                    </div>
                </div>	
                @endif
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('common.role')}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col">
                        <x-forms.select id="role" name="role" :data="$role" :value="isset($roleid) ? $roleid : ''" :label="trans('common.role')" />
                    </div>
                </div>				
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ trans('ngkhoa.nguoi')}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col">
                        <x-forms.select-ajax :label="trans('ngkhoa.doi')" id="maDoi" />
                    </div>
                    <div class="form-group col">
                        <x-forms.select-ajax :label="trans('ngkhoa.nhanh')" id="maNhanh" />
                    </div>
                    <div class="form-group col">
                        <x-forms.select-ajax :label="trans('ngkhoa.nguoi')" id="nguoiList" />
                    </div>
                </div>				
            </div>
        </div>	
    </div>
</div>