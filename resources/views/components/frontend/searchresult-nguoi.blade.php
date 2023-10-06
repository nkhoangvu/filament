    <!-- Nguoi entry -->
    <article class="entry">
        <h4>
          <a href="/nguoi/{{$data->MaNguoi}}"><x-giapha.ten :data="$data" /></a> 
        </h4>
        <ul>
          <li>{{ trans('ngkhoa.doi')}}: {{$data->MaDoi}}</li>
          <li>{{ trans('ngkhoa.nhanh')}}: {{$data->MaNhanh}}</li>
          <li>{{ trans('ngkhoa.ngaysinh')}}: {{$data->NgaySinhAL}}</li>
        </ul>
    </article>
    <!-- End Nguoi entry -->