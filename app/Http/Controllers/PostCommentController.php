<?php

namespace App\Http\Controllers;

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
        );
    return redirect()->route('blog-post.show')->with('success', 'Comment added');
    }
}
