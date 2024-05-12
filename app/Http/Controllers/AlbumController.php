<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{

    public function manage(){
        return view('album.index', [
            'albums' =>  Auth::user()->album
        ]);
    }

    public function index(){
        $gallery = Album::all();
        return view('album.home', [
            'gallery' => $gallery,
        ]);
    }


    public function create()
    {
        return view('album.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'gallery.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $gallery = array();
        if($files = $request->file('gallery')){
            foreach($files as $file){
                $galley_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $gallery_full_name = $galley_name.'.'.$ext;
                $upload_path = 'uploads/album/';
                $gallery_url = $upload_path.$gallery_full_name;
                $file->move($upload_path, $gallery_full_name );
                $gallery[] = $gallery_url;
            }
        }
        $formFields['gallery'] = implode('|', $gallery);
        $formFields['created_by'] = auth()->id();

        Album::create($formFields);



 

        return redirect('/');
    }
}
