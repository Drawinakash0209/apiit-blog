<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

   public function create()
   {
    return view('admin.category.create');
   }

   public function store(CategoryFormRequest $request)
   {

    $data = $request->validated();

    $category = new Category;
    $category->name = $data['name'];
    $category->slug = $data['slug'];
    $category->description = $data['description'];
    if ($request->hasFile('image')){
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/category/', $filename);
        $category->image = $filename;

    }
    $category->meta_title = $data['meta_title'];
    $category->meta_description = $data['meta_description'];
    $category->meta_keywords = $data['meta_keywords'];

    $category->navbar_status = $request->navbar_status == true ? '1':'0';
    $category->status = $request->status == true ? '1':'0';
    $category->created_by = 0;//Auth::user()->id;
    $category->save();
    return redirect('/admin/categories')->with('success', 'Category added successfully');
  



}
}
