<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        if (Auth::check()) {

            $request->validate([
                'body' => 'required',
            ]);

            $data = $request->all();
            $data['user_id'] = Auth::id();

            //dd($data);

            Comment::create($data);

            return redirect()->back();
        }

        return redirect('login')
               ->withSuccess('You aren\'t allowed to do this');

    }

    public function edit_comment(Request $request) {

        // dd($request->all());
        $comment = Comment::where('id', $request->id)->first();
        if ($comment) {

            $comment->update([
                'body' => $request->body,
            ]);

            return back()->with('success', 'comment updated');
        } else {

            return back()->with('error', 'comment not updated');

        }
    }

    public function destroy(Request $request) {

        $comment = Comment::where('id', $request->id)->first();

        if($comment) {

            $comment->delete();

            return back()->with('success', 'Comment deleted successfully!');
        } else {
            return back()->with('error', 'Comment not deleted!');
        }

    }

}
