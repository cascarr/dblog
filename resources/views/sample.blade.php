@extends('layouts.app')

@section('content')



  <div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="row">
                <div class="col-8">
                    <h1 class="display-one">
                        Our Blog!
                    </h1>
                    <p>
                        Enjoy reading our posts. Click on a post to read!
                    </p>
                </div>

                <div class="col-4">
                    <p>Create new Post</p>
                    {{-- <a href="/blog/create/post" class="btn btn-primary btn-sm">
                        Add Post
                    </a> --}}
                    <a class="btn btn-primary" data-toggle="modal" data-target="#addPostModal" >
                        Add Post
                    </a>
                </div>
            </div>

            @forelse($posts as $post)
              <ul>
                <li>
                  <!--  -->
                    <a href="./blog/{{ $post->id }}">
                      {{-- <a href=""> --}}
                        {{ ucfirst($post->title) }}
                    </a>
                </li>
              </ul>
            @empty
              <p class="text-warning">
                No blog Posts available.
              </p>
            @endforelse

        </div>

        <!-- map out the model fade -->
        <div class="modal fade" id="addPostModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="formModalLabel">
                  Create Post
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div><!-- modal-header -->

              <div class="modal-body">

                <form method="POST" action="{{ route( 'posts.store' ) }}">
                    @csrf
                    {{-- <div class="form-group">
                        <input type="hidden" id="id" name="id" value="0">
                    </div> --}}

                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                           placeholder="Enter title" value="">
                  </div>

                  <div class="form-group">
                    <label for="">Body</label>
                    <input type="text" class="form-control" id="body" name="body"
                           placeholder="Enter a post description" value="">
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" value="add">
                      Save Post
                    </button>
                  </div><!-- modal-footer -->
                </form>

              </div><!-- modal-body -->

            </div><!-- modal-content -->
          </div>
        </div><!-- modal fade -->

    </div>
  </div>
@endsection
