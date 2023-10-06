<script type="text/javascript">
    $(function () {
        $("#userForm").validate({
              rules: {
                name: {
                    required: true,
                  },
                department: {
                    required: true,
                  },
                email: {
                    email: true,
                  },
            },
        messages: {
            name: {
                required: "{{ trans('common.input_required') }}",
                },
            group: {
                required: "{{ trans('common.select_required') }}",
                },
            email: {
                email: "{{ trans('common.input_email') }}",
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
    
    
        new TomSelect("#group",{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        
    });
    
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
</script>

<script type="text/javascript">
    
    var selectedMaDoi = "@if(isset($data->nguoi)){{ $data->nguoi->MaDoi }}@endif";
    var selectedMaNhanh = "@if(isset($data->nguoi)){{ $data->nguoi->MaNhanh }}@endif";
    var selectedMaNguoi = "@if(isset($data->nguoi)){{ $data->nguoi->MaNguoi }}@endif";

    // Ajax call to populate MaDoi options
    $(document).ready(function () {
        $.ajax({
            url: "{{ route('maDoi.getOptions') }}",
            type: "GET",
            success: function (data) {
                $('#maDoi').html(data);
                $('#maDoi').val(selectedMaDoi); // Set selected value for MaDoi
                $('#maDoi').change(); // Trigger change event to populate MaNhanh options
            }
        });
    });

    // Ajax call to populate MaNhanh options based on selected MaDoi
    $('#maDoi').change(function () {
        var maDoi = $(this).val();
        if (maDoi !== '') {
            $.ajax({
                url: "{{ route('maNhanh.getOptions') }}",
                type: "GET",
                data: { maDoi: maDoi },
                success: function (data) {
                    $('#maNhanh').html(data);
                    $('#maNhanh').val(selectedMaNhanh); // Set selected value for MaNhanh
                    $('#maNhanh').change(); // Trigger change event to populate Nguoi options
                }
            });
        } else {
            $('#maNhanh').html('<option value="">-- Select MaNhanh --</option>');
        }
    });

    // Ajax call to populate Nguoi options based on selected MaDoi and MaNhanh
    $('#maNhanh').change(function () {
        var maDoi = $('#maDoi').val();
        var maNhanh = $(this).val();
        if (maDoi !== '' && maNhanh !== '') {
            $.ajax({
                url: "{{ route('nguoi.getList') }}",
                type: "GET",
                data: { maDoi: maDoi, maNhanh: maNhanh },
                success: function (data) {
                    $('#nguoiList').html(data);
                    $('#nguoiList').val(selectedMaNguoi); // Set selected value for MaNguoi
                }
            });
        } else {
            $('#nguoiList').html('<option value="">-- Select Nguoi --</option>');
        }
    });
</script>
