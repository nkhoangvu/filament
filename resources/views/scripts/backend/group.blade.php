<script type="text/javascript">

    $(function () {
        $("#mainForm").validate({
              rules: {
                name: {
                    required: true,
                  },
            },
        messages: {
            name: {
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