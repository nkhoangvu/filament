<script src="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/js/tom-select.complete.js"></script>
<script src="/js/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
	$(function () {
		$("#mainForm").validate({
			rules: {
				TenPhongTang: {
					required: true,
				},
			},
		messages: {
			TenPhongTang: {
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

</script>