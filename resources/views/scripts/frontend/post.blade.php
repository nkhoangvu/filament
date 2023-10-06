<script>

    function delete_image(event) {
            event.preventDefault();
            $('#edit_post_image').remove()
            var div = $('.col-6'); 
            var image = div.find('img'); 

  if (image.length > 0) {
    // Image element found within the div
    // Perform any additional logic here
    console.log('Image found!');
  } else {
    // Image element not found within the div
    var inputFile = $('<input type="file" class="form-control" id="post_img" name="post-img">');
    div.append(inputFile);
  }
        }

    function editPost(post_id, post_content, post_img) {
        console.log(post_content)
        $('#edit_post_content').val(post_content)
        $('#post_id').val(post_id)
        $('#post-img').val(post_img)
        $('#edit_post_image').attr('src', "{{ asset('images/') }}" + "/"+post_img)
    }
        $('#post-content').on('paste', function (event) {
            var inputItem = (event.clipboardData || event.originalEvent.clipboardData).items;
            var item = inputItem[0];
            if (item.type.indexOf('image') !== -1) {
                var file = item.getAsFile();342
                console.log(file)
            }
        });
    

        $(document).ready(function (){
            $('#delete_post_from_modal').on('click', function () {
                var post_id = $('#delete_post_from_modal').val()
                var url = "{{ route('post.delete', ['post' => 'post_id']) }}"
                url = url.replace('post_id', post_id)
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    data: {
                        post_id: post_id,
                        _token: '{{ csrf_token() }}'},
                    success: function (response) {
                        $('#close_modal').click()
                        $('#post' + post_id).remove()
                    },
                    erorr:function (error) {
                        console.log(error);
                    }
                })
            })
        })
  </script>