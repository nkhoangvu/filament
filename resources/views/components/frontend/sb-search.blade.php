<h3 class="sidebar-title">{{ trans('common.search') }}</h3>
<div class="sidebar-item search-form">
  <form id="searchForm" class="form-horizontal" action="{{ route('search.post') }}" method="GET" enctype="multipart/form-data">
    @csrf
    <input type="text" placeholder="{{ trans('ngkhoa.search_baiviet') }}" aria-label="Search" name="search">
    <button type="submit" aria-label="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
  </form>
</div><!-- End sidebar search formn-->