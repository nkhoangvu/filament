<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#mainTable tfoot th').each( function (index ) {
            if(index != 3)
            {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="[Tìm] '+title+'"  style="width: 100%" />' );
            }
        } );
        
        var table = $('#mainTable').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu",
                "info": " Hiển thị từ _START_ đến _END_ trong tổng số  _TOTAL_ trường dữ liệu",
                "infoEmpty": "Không có kết quả phù hợp",
                "infoFiltered": "（Trong tổng số _MAX_ trường dữ liệu）",
                "infoThousands": ",",
                "lengthMenu": "_MENU_ Hiển thị",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không có dữ liệu phù hợp",
                "paginate": {
                    "first": "Đầu tiên",
                    "last": "Cuối cùng",
                    "next": "Tiếp",
                    "previous": "Trước"
                    },
                },
            "responsive": true, 
            "paging": true,
              "searching": true,
              "ordering": true,
              "info": true,
            "lengthChange": false, 
            "lengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],
            "autoWidth": false,
            "stateSave": true,
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
            } );
        } );

        $("#reset-table").click(function(){
            table.state.clear();
            window.location.reload();
        });
    } );
</script>
