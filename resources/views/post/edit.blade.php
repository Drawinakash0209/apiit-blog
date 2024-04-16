
@extends('layout')

@section('content')
    <div class="container-fluid px-4 mt-5">
       
        <div class="card">
            <div class="card-header ">
                <h4>Edit Posts

                   
                </h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

                <form action="{{url('update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">

                    @method('PUT')


                    @csrf

                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <select name="category_id" required class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}" {{$post->category_id == $item->id ? 'Selected' : ''}}>
                                    {{$item->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Post name" class="form-label">Post name</label>
                        <input type="text" name="name" value="{{$post->name}}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" value="{{$post->slug}}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Category Description</label>
                        <textarea name="description" id="my_summernote" rows="5" class="form-control">{{$post->description}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Description" class="form-label">Youtube Video Link (iframe)</label>
                        <input type="text" name="v_iframe"  value="{{$post->v_iframe}}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="Description" class="form-label">Tags</label>
                        <input type="text" name="tags"  value="{{$post->tags}}" class="form-control">
                    </div>


                    

                <h5>SEO Tags</h5>

                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{$post->meta_title}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Meta Description</label>
                    <textarea name="meta_description" rows="3"  class="form-control">{{$post->meta_description}}</textarea>
                </div>


                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3"  class="form-control">{{$post->meta_keywords}} </textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>

                    <div class="col-md-3 mb-3">
                        <input type="checkbox" name="terms">
                        <label for="">Agree with <a href="/terms"> terms and conditions</a></label>
                    </div>

                    <div class="col-md-6">
                        <button  type="submit" class="btn-btn-primary">Submit</button>
                    </div>
                        


                    

                </form>
            </div>
        </div>

       

    
    </div>
    
@endsection