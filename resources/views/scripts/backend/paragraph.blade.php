<script type="text/javascript">
	$(function () {
		$("#mainForm").validate({
			rules: {
				title: {
					required: true,
				},
				dis_order: {
					required: true,
				},
				content: {
					required: true,
				},
			},
		messages: {
			title: {
				required: "{{ trans('common.input_required') }}",
				},
			content: {
				required: "{{ trans('common.input_required') }}",
				},
			},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
			},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
			},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
			}
		});
		
	});

	$('#date').datetimepicker({
		format: 'L',
		locale: "ja",
	});

</script>

<script src="/js/ckeditor/ckeditor.js"></script>

<script>
		CKEDITOR.replace( 'editor1', {
		filebrowserBrowseUrl: '{{ asset(route('ckfinder_browser')) }}',
		filebrowserImageBrowseUrl: '{{ asset(route('ckfinder_browser')) }}?type=Images',
		filebrowserFlashBrowseUrl: '{{ asset(route('ckfinder_browser')) }}?type=Flash',
		filebrowserUploadUrl: '{{ asset(route('ckfinder_connector')) }}?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl: '{{ asset(route('ckfinder_connector')) }}?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl: '{{ asset(route('ckfinder_connector')) }}?command=QuickUpload&type=Flash',
		height: '450px',
		});
</script>