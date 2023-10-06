@props(['data'])

<!-- Modal -->
<div class="modal fade" id="imageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="imageModal" aria-hidden="true">
    <form class="form-horizontal" id="subForm" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title" id="imageModalLabel">{{ trans('common.image_upload') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
              <div class="form-group col-md-12">
                <x-forms.input-file :label="trans('common.image')" id="filename" name="filename" />
              </div>
              <div class="form-group col-md-12">
                  <x-forms.input value="" :label="trans('common.title')" name="image_title" />			    
              </div>
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('common.close') }}</button>
                  <button type="submit" class="btn btn-primary" id="formSubmit">{{ trans('common.save') }}</button>
            </div>
          </div>
    </div>
    </form>
  </div>