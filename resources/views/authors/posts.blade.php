<h1>See user's posts</h1>

@forelse ($posts as $post)
   <h2>{{ $post->title }}</h2>
@empty
   <p>Sorry, you currently have no posts.</p>
@endforelse
