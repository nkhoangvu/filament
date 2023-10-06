<script type="text/javascript">
	$(document).ready(function() {      
		$("#subForm").submit(function(event){
			submitForm();
			return false;
		});
	});

	function submitForm(){
		var form = document.forms.namedItem("subForm"); // high importance!, "subForm" is the name of your form
		//var formData = new FormData(form); // high importance!

		$.ajax({
			async: true,
			type: "POST",
			url: "{{ route('product.img-add', [$data->id]) }}",
			cache:false,
			processData: false, // high importance!
			contentType: false, // high importance!
			data: new FormData(form), // high importance!
			success: function(response){
				$("#imageModal").modal('hide');
				location.reload();
			},
			error: function(data){
				alert("Error: "+data.responseText);
			}
		});
	}
    $('#imageModal1').on('hidden.bs.modal', function () {
    	location.reload();
	})
</script>