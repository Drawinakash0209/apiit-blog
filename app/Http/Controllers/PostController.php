<?php

namespace App\Http\Controllers;

use Share;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $category = Category::where('id', $post->category_id)->first();

        // Generating share buttons for the post
        $shareButtons = Share::page(
            url()->current(),
        $post->name
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->whatsapp()
        ->pinterest()
        ->reddit()
        ->telegram();

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('category_id',$post->category_id)->get();



        return view('user.show', [
            'category' => Category::Where('id', $post->category_id)->first(),
            'blog'=> $post,
            'shareButtons' => $shareButtons,
            'relatedPosts' => $relatedPosts,
        ]);
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
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->v_iframe = $data['v_iframe'];
        $post->tags = $request->tags;



        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->image = $filename;

        }



        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request = 1;
        $post->created_by = Auth::user()->id;

        $post->save();

        return redirect('/manage')->with('message', 'Post added successfully');

    }

    public function edit($post_id)
    {
        $categories = Category::where('status','0')->get();
        $post = Post::find($post_id);
        return view('post.edit',compact('post', 'categories'));
    }

    public function update(PostFormRequest $request, $post_id)
    {

        $data = $request->validated();

        $post = Post::find($post_id);
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->v_iframe = $data['v_iframe'];

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->image = $filename;

        }
        $post->tags = $request->tags;
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request->status == true ? '0':'1';
        $post->created_by = 0;//Auth::user()->id;
        $post->update();

        return redirect('/post')->with('message', 'Post updated successfully');

}

public function destroy($post_id)
{
    $post = Post::find($post_id);
    $post->delete();
    return redirect('/post')->with('message', 'Post deleted successfully');
}


//Search Functionality
public function search(Request $request)
{
    $search = $request->search;

    $blog = Post::where(function ($query) use ($search){

        $query->where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('category_id', 'like', "%$search%")
            ->orWhere('slug', 'like', "%$search%")
            ->orWhere('meta_title', 'like', "%$search%")
            ->orWhere('meta_description', 'like', "%$search%")
            ->orWhere('meta_keywords', 'like', "%$search%");
    })
        ->orderBy('created_at', 'desc') // Sort by creation date in descending order
        ->get();

    // Fetch recent blogs
    $recentblogs = Post::latest()->take(3)->get();

    return view('user.home', compact('blog', 'search', 'recentblogs'));
}


//this was the previous route for manage
// public function manage(){
//     return view('user.post-manage', [
//         'posts' =>  Auth::guard('student')->user()->posts
//     ]);
// }

//this is the new route for manage
public function manage(){
    return view('user.post-manage', [
        'posts' =>  Auth::user()->posts
    ]);
}

}
