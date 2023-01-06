<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * index for author data
     */
    public function profile() {

        $author = Auth::user();

        return view('authors.index', [
            'author' => $author,
        ]);
    }

    /**
     * Call up the profile edit form
     */
    public function editprofile(User $author) {
        // check if user is authenticated
        if (Auth::check()) {

            if (Auth::user()->id === $author->id) {
                return view('authors.edit_profile', [
                    'author' => $author,
                ]); // returns author's view edit
            }
            return \Redirect::to('user');
        }
        return redirect('login')->withSuccess('You aren\'t allowed to edit');
    }

    /**
     * Store author's update
     */
    public function updateprofile(User $author, Request $request) {

        // validation rules
        $request->validate([
            'name' => 'required|min:4|string|max:255',
            'email' => 'required|email|string|max:255'
        ]);

        $author->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect('/')->with('message', 'Profile Updated Successfully!');

    }

    /**
     * Ajax profile update (name, email)
     */
    public function ajupdate_profile(Request $request) {

        if (Auth::check()) {
            $author = User::where('id', $request->id)->first();

            // check author's existence
            if ($author) {

                // validates the user input
                $request->validate([
                    'name' => 'required|min:4|string|max:255',
                    'email' => 'required|email|string|max:255'
                ]);

                // update the user input in the database
                $author->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);
                return back()->with('success', 'Your data has been updated!');

            } else {
                return back()->with('error', 'Are you alien?');
            }
        }
        return redirect('login')->withSuccess('You must be logged in!!');

    }

    /**
     * Reset user's password
     */
    public function reset_passwd() {

        return view('authors.reset_pswd');
    }

    /**
     * Update Password
     */
    public function updatepasswd(Request $request) {

        if (Auth::check()) {
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required',
                'confirm_newPassword' => 'required',
            ]);

            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)) {
                return back()->with("error", "Old Password Doesn't match!");
            }

            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with("status", "Password changed successfully!");
        }
        return redirect('login')->withSuccess('You must be logged in!!');

    }

    //
    /**
     * Get all post from an author
     */
    public function author_post(User $author) {

        // $postss = BlogPost::where('user_id', Auth::user()->id)->get();
        // dd($postss);

        return view('authors.posts', [
            'posts' => $author->posts,
            // 'postss' => $postss,
        ]);
    }

    /**
     * Only posts from Auth user
     */
    public function auth_authorposts(User $author) {

        $author = Auth::user();
        $posts = BlogPost::where('user_id', Auth::user()->id)->get();
        // $posts = BlogPost::where('user_id', $author->id)->get();
        $last_post = BlogPost::whereUserId(Auth::user()->id)->first();

        return view('authors.authposts', [
            'posts' => $posts,
            'author' => $author,
            'post' => $last_post,
        ]);
    }

    /**
     * Delete an Auth user's post
     */
    public function postdestroy(Request $request) {

        if (Auth::user()) {
            $post = BlogPost::where('id', $request->id)->first();

            if ($post) {

                $post->delete();
                return back()->with('success', 'Post deleted successfully!');

            } else {
                return back()->with('error', 'Post not deleted!');
            }
        }
        return redirect('login')->withSuccess('You aren\'t allowed to do this');
    }
}
