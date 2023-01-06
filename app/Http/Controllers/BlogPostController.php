<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class BlogPostController extends Controller
{
    public function welcome() {
        $bposts = BlogPost::latest()->get();
        $posts = BlogPost::orderBy('created_at', 'desc')->simplePaginate(3);
        // $postss = BlogPost::skip(10)->limit(4)->get();
        $postss = BlogPost::latest()->limit(3)->get();
        // dd($postss);

        return view('welcome', [
            'bposts' => $bposts,
            'posts' => $posts,
            'postss' => $postss
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts = BlogPost::with('author')->latest()->get(); // fetch all blog posts from DB
        $posts = BlogPost::latest()->get();

        return view('blog.index', [
            'posts' => $posts,
        ]);
        // returns the fetched posts
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check()) {
            return view('blog.create');
        }

        return redirect('login')->withSuccess('You must be logged in, to continue!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);

        return redirect('blog/'. $newPost->id);
    }

    /**
     * Ajax functionality for Creating Post
     *
     * @param Request $request
     * @return void
     */
    public function ajax_store(Request $request) {

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if (Auth::check()) {
            //
            $newPost = BlogPost::create([
                'title' => $request->title,
                'body' => $request->body,
                'user_id' => Auth::id()
            ]);

            return redirect('blog/'. $newPost->id)->with('success', 'Post created successfully!');
        }
        return redirect('login')->withSuccess('You must be logged in, to continue!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        $postss = BlogPost::latest()->limit(3)->get();
        //
        return view('blog.show', [
            'post' => $blogPost,
            'postss' => $postss
        ]); // returns the fetched posts.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        //
        // dd($blogPost);
        if (Auth::check()) {

            if(Auth::user()->id == $blogPost->user_id){
                return view('blog.edit', [
                    'post' => $blogPost,
                ]); // returns the edit view with the post
            }
             return \Redirect::to('/blog');
        }
        return redirect('login')->withSuccess('You aren\'t allowed to edit');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('blog/'. $blogPost->id);
    }

    public function ajax_update(Request $request) {

        if (Auth::check()) {
            $post = BlogPost::where('id', $request->id)->first();


            if ($post) {
                //dd($post);

                $post->update([
                    'title' => $request->title,
                    'body' => $request->body,
                    'user_id' => Auth::user()->id
                ]);
                return back()->with('success', 'Post updated successfully!');
            } else {
                return back()->with('error', 'Post not updated!');
            }
        }
        return redirect('login')->withSuccess('You aren\'t allowed to edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        //Many gates to go. A walk of a thousand miles, starts with a step.
        if (Auth::check()) {
            $blogPost->delete();

            return redirect('/blog');
        }

        return redirect('login')->withSuccess('You aren\'t allowed to do this');
    }

    public function ajax_destroy(Request $request) {

        if (Auth::check()) {
            $post = BlogPost::where('id', $request->id)->first();

            if ($post) {

                $post->delete();
                return redirect('/blog')->with('success', 'Post deleted successfully!');

            } else {
                return back()->with('error', 'Post not deleted!');
            }
        }
        return redirect('login')->withSuccess('You aren\'t allowed to do this');
    }
}
