<script type="text/javascript">
    $(document).ready(function() {
        $("#mainForm").validate({
          rules: {
            Ho: {
                required: true
                  },
            Ten: {
                required: true,
                  },
            MaCha: {
                required: true
                  },
            MaMe: {
                required: true
                  },
            ConThu: {
                required: true
                  },
            DoiThu: {
                required: true
                  },
            ChiThu: {
                required: true
                  }, 
            GioiTinh: {
                required: true
                  }, 
            },
        messages: {
            model: {
                required: "{{ trans('infra.select_model')}}",
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

	    $('#NgayMatDL').datetimepicker({
		    format: 'L',
		    locale: "vi",
		  });     

      $('.custom-file-input').change(function (e) {
		    var files = [];
		    for (var i = 0; i < $(this)[0].files.length; i++) {
			    files.push($(this)[0].files[i].name);
		    }
		    $(this).next('.custom-file-label').html(files.join(', '));
	    });

    });
</script>