<script type="text/javascript">

  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#daureTable tfoot th').each( function (index ) {
      if(index != 7)
          {
              var title = $(this).text();
              $(this).html( '<input type="text" placeholder="{{ trans('common.filter') }} - '+title+'" style="width: 100%"/>' );
          }
    } );
      
    var table = $('#daureTable').DataTable({
        "responsive": true, 
        "paging": true,
              "searching": true,
            "ordering": true,
            "info": true,
        "lengthChange": true, 
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "autoWidth": false,
                "stateSave": false,
    } );

    // Apply the search
    table.columns().every( function () {
        var that = this;
    
        $('input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                  .search( this.value )
                    .draw();
                }
            });
        });

    $("#reset-table").click(function(){
        table.state.clear();
        window.location.reload();
    });

    
    $("#mainForm").validate({
      rules: {
      MaLoaiPhoiNgau: {
        required: true
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
    
  });

</script>