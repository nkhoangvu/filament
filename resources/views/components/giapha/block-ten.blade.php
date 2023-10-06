@props(['data'])

                    <!-- Profile Image -->
                    <div class="card card-warning card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if(isset($data->ChanDung))

                                <img class="profile-user-img img-fluid rounded-circle"  src="/uploads/chan-dung/{{$data->ChanDung}}" alt="User profile picture">    
                                @else

                                <img class="profile-user-img img-fluid"  src="/uploads/chan-dung/no_pic.png" alt="User profile picture">    
                                @endif    
                            </div>

                            <h3 class="profile-username text-center">
                                <strong>
                                    <x-giapha.ten :data="$data" />
                                </strong>
                                
                                @hasRoleAndOwns('user', $data)

                                <a href="{{ route('family.nguoiEdit', [$data->MaNguoi]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                @endOwns

                            </h3>

                            <p class="text-muted text-center">{{ trans('ngkhoa.doi')}}&nbsp;{{$data->MaDoi}} @if($data->MaDoi > 5) -&nbsp; {{ trans('ngkhoa.nhanh')}}&nbsp;{{$data->MaNhanh}} @endif</p>
                            
                            @if($data->MaNguoi > 1)

                            <ul class="list-group list-group-unbordered mb-3">
                                @if(Illuminate\Support\Facades\Route::is('family.show'))

                                <li class="list-group-item">
                                    <b>{{ trans('ngkhoa.cha') }}</b>
                                    <a class="float-right" href="{{ route('family.show', ['id'=>$data->cha->MaNguoi]) }}">
                                        <x-giapha.ten :data="$data->cha" />
                                    </a>
                                </li>
                                @else

                                <li class="list-group-item">
                                    <b>{{ trans('ngkhoa.cha') }}</b>
                                    <a class="float-right" href="{{ route('nguoi.show', ['id'=>$data->cha->MaNguoi]) }}">
                                        <x-giapha.ten :data="$data->cha" />
                                    </a>
                                </li>
                                @endif

                                <li class="list-group-item">
                                    <b>{{ trans('ngkhoa.me') }}:</b>
                                    <span class="float-right">
                                        <x-giapha.ten :data="$data->me"/>
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ trans('ngkhoa.con') }}:</b>
                                    <span class="float-right">{{ $data->ConThu }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ trans('ngkhoa.gioitinh') }}:</b>
                                    <span class="float-right">
                                        <x-giapha.gioitinh :data="$data"/> 
                                    </span>
                                </li>
                            </ul>
                            @endif
                            
                        </div>
                    </div>