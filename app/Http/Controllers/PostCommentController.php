<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function store(Request $request){
        // dd($request);
        Auth::user()->blogPostsComments()->create(
            $request->validate([
                'body' => 'string|required',
                'post_id' => 'integer'
            ])
        )->save();
    return redirect()->route('blog-post.show', $request->post_id)->with('success', 'Comment added');
    }

    public function edit(PostComment $comment){
        return inertia('Comments/Edit',
        ['comment' => $comment]);
    }

    public function update(Request $request, PostComment $comment){
        $comment->update(
            $request->validate([
                'body' => 'string|required',
                'post_id' => 'integer|required'
            ])
        );
        return redirect()->route('blog-post.show', $request->post_id)->with('success', 'Comment edited');

    }
}
