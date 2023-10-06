<script type="text/javascript">
	$(function () {

		$("#mainForm").validate({
		  rules: {
			MaLoaiPhoiNgau: {
				required: true
				  },
			Ho: {
				required: true,
				  },
			Ten: {
				required: true
				  },
			GioiTinh: {
				required: true,
				number: true,
				  },
			},
		messages: {
			customer: {
				required: "{{ trans('ad.select_customer')}}",
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
	
        //Date picker
	    $('#NgaySinhDL').datetimepicker({
		    format: 'L',
		    locale: "vi",
		});
		
	});
	
</script>