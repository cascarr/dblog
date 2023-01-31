@extends('layouts.app')

@section('content')

<!--- Page Content --->
<!--- Banner Starts Here --->
<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">

            @forelse($bposts as $post)
            <div class="item">
                <img src="{{ asset('images/banner-item-01.jpg') }}" alt="banner-item-01">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>
                                {{ $post->category->title }}
                            </span>
                        </div><!--- meta-category --->
                        <a href="{{ route( 'blog.show', $post->id ) }}">
                            <h4>
                                {{ $post->title }}
                            </h4>
                        </a>
                        <ul class="post-info">
                            <li>
                                <a >
                                    {{ $post->author->name }}
                                </a>
                            </li>
                            <li>
                                <a>
                                    {{ $post->created_at }}
                                </a>
                            </li>
                            <li>

                                @if ( count($post->comments) > 1 )
                                    <a>
                                        {{ count($post->comments) }} Comments
                                    </a>
                                @else
                                    <a>
                                        {{ count($post->comments) }} Comment
                                    </a>
                                @endif

                            </li>
                        </ul>
                    </div><!--- main-content --->
                </div><!--- item-content --->
            </div><!--- item --->
            @empty
            <div class="item">
                <img src="{{ asset('images/banner-item-01.jpg') }}" alt="banner-item-01">
            </div>
            @endforelse

        </div><!--- owl-banner --->
    </div><!--- container-fluid --->
</div><!--- main-banner header-text Banner ENDS --->

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
                                <a rel="nofollow" href="{{ route( 'register-user' ) }}">
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

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">

                        @forelse($posts as $post)
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="{{ asset( '/storage/uploads/'. $post->photo_name ) }}" alt="{{$post->photo_name}}">
                                </div><!--- blog-thumb --->
                                <div class="down-content">
                                    <span>
                                        {{ $post->category->title }}
                                    </span>
                                    <a href="{{ route( 'blog.show', $post->id ) }}">
                                        <h4>
                                            {{ ucfirst($post->title) }}
                                        </h4>
                                    </a>
                                    <ul class="post-info">
                                        <li>
                                            <a href="{{ route( 'author.posts', $post->author->id ) }}">
                                                {{ $post->author->name }}
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                {{ $post->created_at }}
                                            </a>
                                        </li>
                                        <li>
                                            @if ( count($post->comments) > 1 )
                                                <a>
                                                    {{ count($post->comments) }} Comments
                                                </a>
                                            @else
                                                <a>
                                                    {{ count($post->comments) }} Comment
                                                </a>
                                            @endif
                                        </li>
                                    </ul>
                                    <p>
                                        {{ $post->body }}.
                                    </p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li>
                                                        <i class="fa fa-tags"></i>
                                                    </li>
                                                    @foreach ($post->tags as $tag)
                                                    <label class="label label-info">
                                                        #{{ $tag->slug }}
                                                    </label>
                                                    @endforeach
                                                </ul>
                                            </div><!--- col-6 --->

                                            <div class="col-6">

                                                <div class="likeShareBtnmt-3">

                                                    <div id="fb-root"></div>
                                                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v15.0&appId=460425145421660&autoLogAppEvents=1" nonce="eiVGSTlv"></script>
                                                    <div
                                                         class="fb-like"
                                                         data-href="http://127.0.0.1:8000/"
                                                         data-width=""
                                                         data-layout="standard"
                                                         data-action="like"
                                                         data-size="small"
                                                         data-share="true">
                                                    </div>

                                                </div><!--- likeShareBtnmt-3 --->

                                            </div><!--- col-6 --->

                                        </div><!--- row --->
                                    </div><!--- post-options --->
                                </div><!--- down-content --->
                            </div><!--- blog-post --->
                        </div><!--- col-lg-12 --->
                        @empty
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <p>
                                    No Story available.
                                </p>
                            </div><!--- blog-post --->
                        </div><!--- col-lg-12 --->
                        @endforelse

                        <div class="col-lg-12" style="text-align: center">
                                    @if ($posts->links()->paginator->hasPages())
                                        {{ $posts->links() }}
                                    @endif
                        </div><!--- col-lg-12 --->

                        {{-- <div class="col-lg-12">
                            <div class="main-button">
                                <a href="#">View All Posts</a>
                            </div>
                        </div><!--- col-lg-12 ---> --}}

                    </div><!--- row --->
                </div><!--- all-blog-posts --->
            </div><!--- col-lg-8 --->

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

                                        @forelse ( $categories as $category )
                                            <li>
                                                <a href="#">
                                                    {{ $category->title }}
                                                </a>
                                            </li>
                                        @empty
                                        <p>No post available</p>
                                        @endforelse

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
                                            {{-- @foreach ($post->tags as $tag)
                                                <a>
                                                    {{ $tag->name }}
                                                </a>
                                            @endforeach --}}
                                        </li>
                                    </ul>
                                </div><!--- content --->
                            </div><!--- sidebar-item tags --->
                        </div><!--- col-lg-12 --->

                    </div><!--- row --->
                </div><!--- sidebar --->
            </div><!--- col-lg-4 --->

        </div aria-hidden="true"><!--- row --->
    </div aria-hidden="true"><!--- container --->
</section aria-hidden="true"><!--- blog-posts --->

  <!-- map out the model fade CREATE STORY -->
  <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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

          <form method="POST" action="{{ route( 'posts.store' ) }}" enctype="multipart/form-data">
              @csrf

            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title"
                     placeholder="Enter title" value="">
            </div>

            <div class="form-group">
              <label for="body">Body</label>

              <textarea name="body" id="body" class="form-control"  rows="5">Description</textarea>
            </div>

            <div class="form-group">

                <label for="category_id">
                    Choose a category
                </label>
                <div class="input-group mb-3">
                    <select name="category_id" id="category_id" class="custom-select">
                        <option selected>
                            What category is your story...
                        </option>
                        @foreach ($selcategories as $category)
                          <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="form-group">
                <label for="tags">Tag your story</label>
                <input type="text" class="form-control" id="tags" name="tags"
                       data-role="tagsinput" placeholder="Make a tag">
            </div>

            <div class="img-container">
                Photos paint a great story
                <input type="file" class="form-control" id="imageFile" name="imageFile">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn " style="background-color: orangered;">
                Save Story
              </button>
            </div><!-- modal-footer -->
          </form>

        </div><!-- modal-body -->

      </div><!-- modal-content -->
    </div>
  </div><!-- modal fade -->
@endsection
