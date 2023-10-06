@props(['recents', 'categories', 'tags'])    

<div class="sidebar">
  <x-frontend.sb-search />
</div>
@if(isset($recents)) 
<div class="sidebar">
  <x-frontend.sb-recents :data="$recents" />
</div>
@endif
@if(isset($categories))
<div class="sidebar">
  <x-frontend.sb-categories :data="$categories" />
</div>
@endif
<div class="sidebar">
  <x-frontend.sb-tags :data="$tags" />
</div>