<script src="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/js/tom-select.complete.js"></script>
<script src="/js/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
	$(function () {
		$("#mainForm").validate({
			rules: {
				title: {
					required: true,
				},
				category_id: {
					required: true,
				},
				created_at: {
					required: true,
				},
				content: {
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
		
	});

</script>

<script type="text/javascript">
	$('#created_at').datetimepicker({
		format: 'L',
		locale: "vi",
	});
	
	new TomSelect("#author",{
        	create: false,
        	sortField: {
            field: "text",
            direction: "asc"
        	}
		});
	
	new TomSelect("#tags", {
        allowEmptyOption: true,
	    maxItems: 5
    });

    $('#seo').CardWidget('collapse');
</script>

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