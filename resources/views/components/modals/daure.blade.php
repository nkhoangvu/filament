@props(['data', 'Cha', 'MoTang'])

<!-- Modal -->
<div class="modal fade" id="daureModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" role="dialog" aria-hidden="true">
  <form class="form-horizontal" id="subForm" method="POST" enctype="multipart/form-data">
    {{ csrf_token() }}
  <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">{{ trans('ad.calendar') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">     
        <x-nguoi :data="$data" :Cha="$Cha" :MoTang="$MoTang" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('common.close') }}</button>
        <button type="submit" class="btn btn-primary" id="formSubmit">{{ trans('common.save') }}</button>
      </div>
    </div>
  </div>
  </form>
</div>
    