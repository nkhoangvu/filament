 <link rel="stylesheet" href="/assets/css/post.css">
<script src="{{ asset('js/post-card.js') }}"></script>

 <div class="row justify-content-center">
        <div class="card shadow my-3" style="width: 35rem;">
            <div class="card-body">
                    <div class="row">
                            <div class="col-1">
                                <a href="profile/{{ auth()->user()->id }}"><img src="{{ asset('images/'.auth()->user()->profile_pic) }}" alt="Avatar" class="post-avatar"> </a>
                            </div>
                            <div class="col-11">
                                <input type="button" data-bs-toggle="modal" data-bs-target="#createPost" class="form-control btn text-start rounded-pill" value="What's on your mind, {{ auth()->user()->firstname }}?... "> 
                            </div>
                    </div>
            </div>
        </div>
    </div>

    @foreach ($posts as $post)
    <div class="row justify-content-center">
        <x-posts.post-card :post="$post" />
    </div>
    @endforeach
        <!-- Create Post Modal -->
    <form method="POST" action="/posts/create">
        @csrf
        <div class="modal fade" id="createPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="fs-5" id="exampleModalLabel">Create Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h6 class="card-title"> 
                        <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" alt="Avatar" class="post-avatar"> {{ auth()->user()->firstname . " " . auth()->user()->lastname }} </h6>
                    <textarea name="post-content" id="post_content" style="outline: none;" class="border-0 mt-3" cols="57" rows="2" placeholder="Write a post..."></textarea>
                    <div class="row">
                        <input type="file" name="post-img" id="post_img" class="form-control">
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary form-control">Post</button>
                </div>
            </div>
            </div>
        </div>
    </form>

    {{-- UPDATE POST MODAL --}}
    <form method="POST" action="/posts/update">
        @csrf
        @method('PUT')
        <div class="modal fade" id="edit_post_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="fs-5" id="exampleModalLabel">Edit Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h6 class="card-title"> 
                        <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" alt="Avatar" class="post-avatar"> {{ auth()->user()->firstname . " " . auth()->user()->lastname }} </h6>
                    <textarea name="post-content" id="edit_post_content" style="outline: none;" class="border-0 mt-3" cols="57" rows="2" placeholder="Write a post..."></textarea>
                    <div class="row justify-content-center d-flex">
                        <div class="col-6 position-relative">
                          <img src="{{ asset('images/me.png') }}" alt="post image" id="edit_post_image"  style="max-height: 250px; max-width: 250px">
                          <input type="hidden" name="post-img" id="post-img" value="">
                            <span> <button class="btn" onclick="delete_image(event)" >Delete Image</button> </span>
                        </div>
                      </div>
                    <input type="hidden" name="post_id" id="post_id">
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary form-control">Save</button>
                </div>
            </div>
            </div>
        </div>
    </form>

    
    {{-- DELETE POST MODAL --}}
    <div class="modal fade" id="delete_post_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
                <div class="modal-body text-center fs-3">
                    Delete post?
                    <input type="hidden" name="post_id" id="delete_id_modal">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close_modal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="delete_post_from_modal">Delete</button>
                  </div>
          </div>
        </div>
      </div>

      {{-- SHARE POST MODAL --}}
      <form method="POST" action="/posts/share">
        @csrf
        <div class="modal fade" id="sharePost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="fs-5" id="exampleModalLabel">Share Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h6 class="card-title"> 
                        <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" alt="Avatar" class="post-avatar"> {{ auth()->user()->firstname . " " . auth()->user()->lastname }} </h6>
                    <textarea name="post_content" id="post_content" style="outline: none;" class="border-0 mt-3" cols="57" rows="2" placeholder="Write a more banger caption <3"></textarea>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    
                    <div class="container border">
                        <br>
                        <img src="" alt="Avatar" id="share_post_profile_pic" class="post-avatar"> <span id="share_full_name">  </span> </h6>
                        <br>
                        <input type="hidden" name="shared_from" id="share_post_id">
                        <label class="m-1" id="share_post_content">  </label>
                        <input type="hidden" name="share_post_image" id="share_post_image">
                        <img src="" alt="" id="share_post_img" name="share_post_img" class="w-100" style="height: 250px">
                    </div>
                    
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary form-control">Share</button>
                </div>
            </div>
            </div>
        </div>
    </form>



    