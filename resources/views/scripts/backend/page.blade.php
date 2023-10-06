<script type="text/javascript">
	$(function () {
		$("#mainForm").validate({
			rules: {
				title: {
					required: true,
				},
			},
		messages: {
			title: {
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
	
		$('.custom-file input').change(function (e) {
		var files = [];
		for (var i = 0; i < $(this)[0].files.length; i++) {
				files.push($(this)[0].files[i].name);
			}
			$(this).next('.custom-file-label').html(files.join(', '));
		});
	});

</script>