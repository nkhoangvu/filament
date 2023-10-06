@props(['data'])

    <!-- Thong tin ca nhan -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('ngkhoa.canhan') }}</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fa-solid fa-calendar-plus"></i> {{ trans('ngkhoa.ngaysinh') }}</strong>          
                            <p class="text-muted">
                                @if(isset($data->NgaySinhDL) || isset($data->NgaySinhAL ))

                                    {{ formatDate($data->NgaySinhDL)}} <br />
                                    {{$data->NgaySinhAL}}
                                @else

                                    {{ trans('ngkhoa.khongro') }}
                                @endif

                            </p>
                            <hr>
                            @if (isset($data->PhapDanh) || isset($data->TenHuy) || isset($data->TenTu) || isset($data->ThuyHieu) || isset($data->TenKhac))     

                            <strong><i class="fa-solid fa-user-tag"></i> {{ trans('ngkhoa.ten_hieu') }}</strong>
                                <ul>
                                @if (isset($data->TenKhac))
                                    <li>{{ trans('ngkhoa.tenkhac') }}: {{$data->TenKhac}}</li>
                                @endif
                                @if (isset($data->PhapDanh))
                                    <li>{{ trans('ngkhoa.phapdanh') }}: {{$data->PhapDanh}}</li>
                                @endif
                                @if (isset($data->TenHuy))
                                    <li>{{ trans('ngkhoa.tenhuy') }}: {{$data->TenHuy}}</li>
                                @endif
                                @if (isset($data->TenTu))
                                    <li>{{ trans('ngkhoa.tentu') }}: {{$data->TenTu}}</li>
                                @endif
                                @if (isset($data->ThuyHieu))
                                    <li>{{ trans('ngkhoa.thuyhieu') }}: {{$data->ThuyHieu}}</li>
                                @endif
                                </ul>
                                <hr>  
                            @endif
                                
                            @if(isset($data->NgayMatDL) || isset($data->NgayMatAL))

                            <hr>
                            <strong><i class="fa-solid fa-calendar-minus"></i> {{ trans('ngkhoa.ngaymat') }}</strong>
                            <p class="text-muted">
                                {{ formatDate($data->NgayMatDL)}} <br />
                                {{$data->NgayMatAL}}
                            </p>
                            @endif
                            
                            @if(isset($data->HuongTho))

                            <hr>
                            <strong><i class="fa-solid fa-heart-pulse"></i> {{ trans('ngkhoa.huongtho') }}</strong>
                            <p class="text-muted">
                                <x-giapha.huongtho :data="$data" />
                            </p>
                            @endif

                            @if(isset($data->motang))

                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> {{trans('ngkhoa.motang')}}</strong>
                            <p class="text-muted">{{$data->kieumotang->KieuMoTang}} - {{$data->motang->NoiMoTang}}</p>
                            @endif     
                            
                        </div>
                    </div>