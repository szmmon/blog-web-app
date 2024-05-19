<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostImageController extends Controller
{
    
    public function create(Post $blog_post){
        return inertia('Posts/Images/Create',
        ['blog_post' => $blog_post]);
    }

    public function store(Post $blog_post, Request $request){
        
        if ($request->hasFile('images')){
            foreach($request->file('images') as $file){
                $path = $file->store('images', 'public');
            
                $blog_post->images()->save(new PostImage(
                    ['filename' => $path]));    
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
