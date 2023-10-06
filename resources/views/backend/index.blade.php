@extends('layouts.backend.default')

@section('pageTitle', 'Dashboard')
@section('home_sb', 'active')

@section('content')
@if ((Auth::user()->roles->pluck('display_name')->first()) != null)
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">@yield('pageTitle')</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <!-- begin breadcrumb -->
	      	<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">{{ trans('common.dashboard') }}</a></li>
        </ol><!-- end breadcrumb -->
			</div><!-- /.col -->
    </div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div><!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $total }}</h3>
            <p>{{ trans('ngkhoa.nguoi_tong')}}</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">{{ trans('common.more_info') }} &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> <!-- ./col -->
      <div class="col-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $nguoi }}</h3>
            <p>{{ trans('ngkhoa.nguoi_nk')}}</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">{{ trans('common.more_info') }} &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> <!-- ./col -->
      <div class="col-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $latest }}</h3>
            <p>{{ trans('ngkhoa.doi_tong')}}</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">{{ trans('common.more_info') }} &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
    </div> <!-- /.row -->

    <!-- 5 Latest Payments  -->
    <div class="row">
		  <div class="col-lg-12">
			  <div class="card card-warning">
				  <div class="card-header">
					  <h5 class="m-0">{{ trans('ngkhoa.nguoi_latest')}}</h5>
				  </div>
				  <div class="card-body">
            <table id="mainTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="20%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
                  <th width="5%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
                  <th width="10%" class="text-center">{{ trans('ngkhoa.doi') }}</th>
                  <th width="5%" class="text-center">{{ trans('ngkhoa.nhanh') }}</th> 
                  <th width="25%" class="text-center">{{ trans('ngkhoa.ngaysinh_al') }}</th> 
                </tr>
              </thead>
                <tbody>
                  @foreach ($data as $item)
                  <tr>
                    <td width="20%"class="text-center"><a href="{{ route('nguoi.show', ['id'=>$item->MaNguoi]) }}">{{ $item->Ho }}&nbsp;{{ $item->TenDem }}&nbsp;{{ $item->Ten }}</td>
                    <td width="5%" class="text-center"> @includeif('partials.gioitinh_item') </td>
                    <td width="10%" class="text-center">{{ trans('ngkhoa.doi') }}&nbsp;{{$item->MaDoi}}</td>
                    <td width="5%" class="text-center">{{ trans('ngkhoa.nhanh') }}&nbsp;{{$item->MaNhanh}}</td>
                    <td width="25%" class="text-center">{{$item->NgaySinhAL}}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <div class="btn-group col-md-2" role="group">
              <a href="{{route('nguoi.index')}}" class="btn btn-sm btn-warning">{{ trans('common.more_info') }}</a>
            </div>
          </div>
			  </div>
		  </div>		
    </div>
  @else
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <br /><br /><br /><br />
    <x-no-role />
  </div>         
  @endif  
  </div>
</section>
    
@endsection