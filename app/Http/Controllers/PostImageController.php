<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostImageController extends Controller
{
    
    public function create(Post $blog_post){
        $blog_post->load(['images']);
        return inertia('Posts/Images/Create',
        ['blog_post' => $blog_post]);
    }

    public function edit(Post $blog_post ,PostImage $image){
        return inertia('Posts/Images/Edit',
        ['blog_post' => $blog_post,
        'image' => $image ]);
    }

    public function update(PostImage $image, Request $request){
        $image->update([
            'title' => $request->title
           ]); 
           return redirect()->route('blog-post.show', $image->post_id )->with('success', 'Title changed');      
    }

    public function store(Post $blog_post, Request $request){
        
        if ($request->hasFile('images')){
            foreach($request->file('images') as $file){
                $path = $file->store('images', 'public');
            
                $blog_post->images()->save(new PostImage(
                    [   'filename' => $path,
                        'title' => $request->title
                        ]));    
            }
        }
        return redirect()->route('blog-post.show', $blog_post)->with('success', 'Images uploaded!');
    }

    public function destroy(Post $blog_post, PostImage $image)
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return back()->with('success', 'Image was deleted!');
    }
}
