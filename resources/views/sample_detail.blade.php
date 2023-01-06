@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt">
                <a href="/blog" class="btn btn-outline-primary btn-sm">
                    Go Back
                </a>
                <h1 class="display-one">
                    {{ ucfirst($post->title) }}
                </h1>
                <span>{{ $post->author->name }}</span>
                <p>{!! $post->body !!}</p>
                <hr>

                @if (Auth::id() == $post->user_id)
                    {{-- <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">
                        Edit Post
                    </a> --}}
                    <a class="btn btn-outline-primary" onclick="editPost( `{{ $post->id }}`, `{{ $post->title }}`, `{{ $post->body }}` )">
                        Edit Post
                    </a>
                    <a class="btn btn-danger" onclick="delPost( `{{ $post->id }}` )">
                        Delete Post
                    </a>
                @endif
                <br><br>

                {{-- <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    @if (Auth::id() == $post->user_id)
                        <button class="btn btn-danger">
                            Delete Post
                        </button>
                    @endif
                </form> --}}

            </div>
        </div>
        <br>

        <h4>Display Comments</h4>

        <div class="col-12 pt">
            @forelse ($post->comments as $comment)
                <p>{{ $comment->body }}</p>
                @if (Auth::id() == $comment->user_id)

                    <a class="btn btn-info btn-sm" onclick="editComment(`{{$comment->id}}`, `{{$comment->body}}`)">
                        Edit Comment
                    </a>
                    <a class="btn btn-danger btn-sm" onclick="delComment(`{{$comment->id}}`)">
                        Delete Comment
                    </a>
                @endif

            @empty

                <p>What do you think about this?</p>
            @endforelse

        </div>

        <br>
        <h4>Add comment</h4>
        <form method="post" action="{{ url('comments') }}">
            @csrf
            <div class="form-group">

                <textarea name="body" id="body" class="form-control"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />

            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Add Comment" />
            </div>
        </form>

    </div>



    <!-- Edit Post Modal -->
    <div id="editPostModal" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route( 'posts.destroy' ) }}">
                    @csrf
                    <div class="modal-header">
                        <p class="modal-title">
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
        <div class="modal-dialog">
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
        <div class="modal-dialog">
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


@endsection
