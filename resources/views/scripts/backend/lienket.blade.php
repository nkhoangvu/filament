<script type="text/javascript">
	$(function () {
		$("#mainForm").validate({
			rules: {
				TenLienKet: {
					required: true,
				},
				URL: {
					required: true,
				},
				MaNguoi: {
					required: true,
				},
			},
		messages: {
			name: {
				required: "{{ trans('common.input_required') }}",
				},
			location: {
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
	
		new TomSelect("#MaNguoi",{
			create: false,
			sortField: {
				field: "text",
				direction: "asc"
			}
		});
	});

</script>
