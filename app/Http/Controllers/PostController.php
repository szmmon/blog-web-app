<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Posts/Index',
        ['blogPosts' => Post::withCount('comments')->get(),
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Posts/Create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        Auth::user()->blogPosts()->create($request->validated());
        return redirect()->route('index')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $blog_post)
    {
        return inertia(
            'Posts/Show',
            ['post' => $blog_post->load('comments'),
            'owner' => $blog_post->load('owner'),
            'comments' => $blog_post->load('comments')]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
