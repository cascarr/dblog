@extends('layouts.app')

@section('content')

    <!--- Page Contact --->
    <!--- Banner Starts Here --->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Story in Detail</h4>
                        </div><!--- text-content --->
                    </div><!--- col-lg-12 --->
                </div><!--- row --->
            </div><!--- container --->
        </section><!--- page-heading --->
    </div><!--- heading-page header-text --->

    <!--- B --->
    <section class="call-to-action">
        <div class="container">
            <div class="row">

                @guest
                <div class="col-lg-12">
                    <div class="main-content">
                        <div class="row">
                            <div class="col-lg-8">
                                <span>
                                    Our Kids, The Future Of Blogging!
                                </span>
                                <h4>
                                    Like Writing? Write For The Next Kid!
                                </h4>
                            </div>
                            <div class="col-lg-4">
                                <div class="main-button">
                                    <a rel="nofollow" href="#">
                                        Sign Up!
                                    </a>
                                </div>
                            </div><!--- col-lg-4 --->
                        </div><!--- row --->
                    </div><!--- main-content --->
                </div><!--- col-lg-12 --->
                @else
                <div class="col-lg-12">
                    <div class="main-content">
                        <div class="row">
                            <div class="col-lg-8">
                                <span>
                                    Today's Kid, Tomorrow's Blogger!
                                </span>
                                <h4>
                                    Kids Writing For Kids!
                                </h4>
                            </div>
                            <div class="col-lg-4">
                                <div class="main-button">
                                    <a rel="nofollow" class="btn" data-toggle="modal" data-target="#addPostModal">
                                        Create Story!
                                    </a>
                                </div>
                            </div><!--- col-lg-4 --->
                        </div><!--- row --->
                    </div><!--- main-content --->
                </div><!--- col-lg-12 --->
                @endguest

            </div><!--- row --->
        </div><!--- container --->
    </section><!--- call-to-action --->

    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset( 'images/blog-post-01.jpg' ) }}" alt="post img">
                                    </div><!--- blog-thumb --->
                                    <div class="down-content">
                                        <span>
                                            Lifestyle
                                        </span>
                                        {{-- <a href="#"> --}}
                                            <h4>
                                                {{ ucfirst($post->title) }}
                                            </h4>
                                        {{-- </a> --}}
                                        <ul class="post-info">
                                            <li>
                                                {{-- <a href="#"> --}}
                                                    {{ $post->author->name }}
                                                {{-- </a> --}}
                                            </li>
                                            <li>
                                                {{-- <a href="#"> --}}
                                                    {{ $post->created_at }}
                                                {{-- </a> --}}
                                            </li>
                                            <li>
                                                {{-- <a href="#"> --}}
                                                    10 Comments
                                                {{-- </a> --}}
                                            </li>
                                        </ul><!--- post-info --->
                                        <p>
                                            {{ $post->body }}
                                        </p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-tags"></i>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Best Templates
                                                            </a>,
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                TemplateMo
                                                            </a>
                                                        </li>
                                                    </ul><!--- post-tags --->
                                                </div><!--- col-6 --->
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                        <li>
                                                            <i class=""></i>
                                                        </li>
                                                        @if (Auth::id() == $post->user_id)
                                                        <li>
                                                            <a class="btn btn-outline-secondary" onclick="editPost( `{{ $post->id }}`, `{{ $post->title }}`, `{{ $post->body }}` )">
                                                                Edit Story
                                                            </a>,
                                                        </li>
                                                        <li>
                                                            <a class="btn btn-danger" onclick="delPost( `{{ $post->id }}` )">
                                                                Delete Story
                                                            </a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div><!--- col-6 --->
                                            </div><!--- row --->
                                        </div><!--- post-options --->
                                    </div><!--- down-content --->
                                </div><!--- blog-post --->
                            </div><!--- col-lg-12 --->

                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>4 comments</h2>
                                    </div><!--- sidebar-heading --->
                                    <div class="content">
                                        <ul>
                                            @forelse ($post->comments as $comment)
                                            <li>
                                                <div class="author-thumb">
                                                    <img src="" alt="">
                                                </div><!--- author-thumb --->
                                                <div class="right-content">
                                                    <h4>
                                                        {{ $comment->author->name }}
                                                        <span>
                                                            {{ $comment->created_at }}
                                                        </span>
                                                    </h4>
                                                    <p>
                                                        {{ $comment->body }}
                                                    </p>
                                                    @if (Auth::id() == $comment->user_id)

                                                        <a class="btn btn-info btn-sm" onclick="editComment(`{{$comment->id}}`, `{{$comment->body}}`)">
                                                            Edit Comment
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" onclick="delComment(`{{$comment->id}}`)">
                                                            Delete Comment
                                                        </a>
                                                    @endif
                                                </div><!--- right-content --->
                                            </li>
                                            @empty
                                            <p>What do you think about this?</p>
                                            @endforelse
                                        </ul>
                                    </div><!--- content --->
                                </div><!--- sidebar-item comments --->
                            </div><!--- col-lg-12 --->

                            <div class="col-lg-12">
                                <div class="sidebar-item submit-comment">
                                    <div class="sidebar-heading">
                                        <h2>Your comment</h2>
                                    </div><!--- sidebar-heading --->

                                    <div class="content">
                                        <form method="POST" action="{{ url('comments') }}" id="comment">
                                            @csrf
                                            <div class="row">

                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                    </fieldset>
                                                </div><!--- col-md-6 col-sm-12 --->
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <textarea name="body" id="body" rows="6"
                                                            placeholder="Type your comment" required></textarea>
                                                    </fieldset>
                                                </div><!--- col-lg-12 --->
                                                {{-- @if (Auth::check()) --}}
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit"
                                                            class="btn main-button">
                                                            Comment
                                                        </button>
                                                        {{-- <input type="submit" class="btn btn-success" value="Add Comment" /> --}}
                                                    </fieldset>
                                                </div><!--- col-lg-12 --->
                                                {{-- @endif --}}
                                            </div><!--- row --->
                                        </form>
                                    </div><!--- content --->

                                </div><!--- sidebar-item submit-comment --->
                            </div><!--- col-lg-12 --->

                        </div><!--- row --->
                    </div><!--- all-blog-posts --->
                </div><!--- col-lg-8 --->

                <!--- SIDEBAR COMES HERE --->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="sidebar-item search">
                                    <form method="GET" action="#" id="search_form" name="gs">
                                        <input type="text" class="searchText" name="q"
                                        placeholder="type to search..." autocomplete="on">
                                    </form>
                                </div><!--- sidebar-item search --->
                            </div><!--- col-lg-12 --->
                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h2>Recent Posts</h2>
                                    </div><!--- sidebar-heading --->
                                    <div class="content">
                                        <ul>
                                            @forelse($postss as $post)
                                            <li>
                                                <a href="{{ route( 'blog.show', $post->id ) }}">
                                                    <h5>
                                                        {{ $post->title }}
                                                    </h5>
                                                    <span>
                                                        {{ $post->created_at }}
                                                    </span>
                                                </a>
                                            </li>
                                            @empty
                                            <p>No post available</p>
                                            @endforelse
                                        </ul>
                                    </div><!--- content --->
                                </div><!--- sidebar-item recent-posts --->
                            </div><!--- col-lg-12 --->
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Categories</h2>
                                    </div><!--- sidebar-heading --->
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    Nature LifeStyle
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!--- content --->
                                </div><!--- sidebar-item categories --->
                            </div><!--- col-lg-12 --->
                            <div class="col-lg-12">
                                <div class="sidebar-item tags">
                                    <div class="sidebar-heading">
                                        <h2>Tag Clouds</h2>
                                    </div><!--- sidebar-heading --->
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    Lifestyle
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!--- content --->
                                </div><!--- sidebar-item tags --->
                            </div><!--- col-lg-12 --->

                        </div><!--- row --->
                    </div><!--- sidebar --->
                </div><!--- col-lg-4 --->

            </div><!--- row --->
        </div><!--- container --->
    </section><!--- blog-posts grid-system --->





    <!-- Edit Post Modal -->
    <div id="editPostModal" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="formModalLabel">
                        Edit Post
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div><!-- modal-header -->

                <div class="modal-body">
                    <form method="POST" action="{{ route( 'posts.update' ) }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="edit_postId" name="id" >
                        </div>
                        <div class="form-group">
                            <label for="edit_postTitle" class="control-label">Title</label>
                            <input type="text" class="form-control" id="edit_postTitle" name="title">
                        </div>
                        <div class="form-group">
                            <label for="edit_postBody" class="control-label">Body</label>
                            <input type="text" class="form-control" id="edit_postBody" name="body">
                        </div>

                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-info" value="Update">
                        </div><!-- modal-footer -->
                    </form>
                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div>
    </div><!-- Edit Post Modal -->

    <!-- Delete Post Modal -->
    <div id="delPostModal" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{ route( 'posts.destroy' ) }}">
                    @csrf
                    <div class="modal-header">
                        <p class="modal-title" >
                            Are you sure you want to delete this post?
                        </p>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="del_postId" class="form-control">
                        </div>
                    </div><!-- modal-body -->

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Delete Post Modal -->

    <!-- Delete Comment Modal -->
    <div id="delCommentModal" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{ route('comments.destroy') }}">
                    @csrf
                    <div class="modal-header">
                        <p class="modal-title">
                            Are you sure you want to delete this comment?
                        </p>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div class="form-group">
                            <input type="hidden" name="id" id="del_id" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">

                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Delete Comment Modal -->

    <!-- Edit Comment Modal HTML -->
    <div id="editCommentModel" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Edit Comment
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div><!-- modal-header -->
                <form method="POST" action="{{ route('comments.update') }}">
                    @csrf

                    <div class="modal-body edit_comment">
                        <div class="form-group">
                            <label for="">Body</label>
                            <input type="hidden" name="id" id="id_input" class="form-control">
                            <input type="text" name="body" id="body_input" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>

            </div>
        </div>
    </div><!-- Edit Modal HTML -->

    <!-- map out the model fade CREATE STORY -->
  <div class="modal fade" id="addPostModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="formModalLabel">
            Create Your Story
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div><!-- modal-header -->

        <div class="modal-body">

          <form method="POST" action="{{ route( 'posts.store' ) }}">
              @csrf

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
              <button type="submit" class="btn btn-primary">
                Save Story
              </button>
            </div><!-- modal-footer -->
          </form>

        </div><!-- modal-body -->

      </div><!-- modal-content -->
    </div>
  </div><!-- modal fade -->


@endsection
