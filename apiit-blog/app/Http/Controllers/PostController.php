<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    }

    public function create()
    {

        $categories = Category::where('status','0')->get();
        return view('post.create' ,compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $post = new Post;
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = $data['description'];
        $post->description = $data['description'];
        $post->v_iframe = $data['v_iframe'];
  
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->image = $filename;
    
        }

        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = 0;//Auth::user()->id;
        $post->save();

        return redirect('/post')->with('message', 'Post added successfully');

    }
}
