@extends( 'authors.layout' )

@section( 'content' )

  <div class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="card card-tasks">
                <div class="card-header">
                    <h5 class="card-title">
                        Posts from {{ $author->name }}
                    </h5>
                </div><!--- card-header --->

                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label for="" class="form-check-label">
                                                <input type="checkbox" class="form-check-input" checked>
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div><!--- form-check --->
                                    </td>
                                    <td class="text-left">
                                        {{ $post->title }}
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" onclick="editpost( `{{  $post->id  }}`, `{{ $post->title }}`, `{{ $post->body }}` )"
                                               class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                               data-toggle="modal" data-original-title="Edit Task">
                                               <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" onclick="delpost( `{{ $post->id }}` )"
                                              class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                              data-toggle="modal" data-original-title="Remove">
                                              <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                  <p>You don't currently have any post</p>
                                  @endforelse
                            </tbody>
                        </table>
                    </div><!--- table-full-width --->
                </div><!--- card-body --->

                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="now-ui-icons loader_refresh spin"></i>
                        You last posted on {{ $post->created_at }}
                    </div><!--- stats --->
                </div><!--- card-footer --->

            </div><!--- card --->
        </div><!--- col-md-12 --->

    </div><!--- row --->
  </div><!--- content --->

  <!--- Modals --->
  <div id="editPostModal" class="modal fade"
       tabindex="-1" role="dialog" aria-labelledby="editPostModal" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered col-md-8" role="document">
            <div class="modal-content card">
                <div class="modal-header card-header">
                    <h5 class="modal-title" id="editPostModal">
                        Edit Post
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!--- modal-header --->

                <div class="modal-body card-body">
                    <form action="{{ route( 'posts.update' ) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label for="title">
                                        Title
                                    </label>
                                    <input type="text" class="form-control" id="editTitle" name="title" value="{{ $post->title }}">
                                </div><!--- form-group --->
                            </div><!--- col-md-6 --->
                        </div><!--- row --->

                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label for="body">
                                        Body
                                    </label>
                                    <textarea name="body" id="editBody" cols="80" rows="4"
                                              class="form-control">{{ $post->body }}</textarea>
                                </div><!--- form-group --->
                            </div><!--- col-md-12 --->
                        </div><!--- row --->

                        <div class="modal-footer">
                            <input type="hidden" class="form-control" id="editId" name="id">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-info" value="Update Post">
                        </div>
                    </form>
                </div><!--- modal-body --->

            </div><!--- modal-content --->
       </div><!--- modal-dialog modal-dialog-centered --->
  </div><!--- modal fade --->

  <!--- Delete Post Modal --->
  <div id="delPostModal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{ route( 'mypost.delete' ) }}">
                @csrf
                <div class="modal-header">
                    <p class="modal-title">
                        Are you sure you want to delete this post?
                    </p>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div><!--- modal-header --->

                <div class="modal-footer">
                    <input type="hidden" class="form-control" id="delpostId" name="id">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div><!--- modal-footer --->
            </form>
        </div><!--- modal-content --->
    </div><!--- modal-dialog --->
  </div><!--- modal fade --->

@endsection
