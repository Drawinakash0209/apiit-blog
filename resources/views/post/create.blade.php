
@extends('student.dashboard')

@section('content')
    <div class="container-fluid px-4 mt-5">
       
        <div class="card">
            <div class="card-header ">
                <h4>View posts

                   
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

                <form action="{{url('/add-post')}}" method="POST" enctype="multipart/form-data">


                    @csrf

                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Post name" class="form-label">Post name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Category Description</label>
                        <textarea name="description" id="my_summernote" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Description" class="form-label">Youtube Video Link (iframe)</label>
                        <input type="text"  name="v_iframe" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="tags">  Tags (Comma Separated)</label>
                        <input
                        type="text"
                        name="tags"
                        placeholder="Example: IT, Business, Law"/>
                        

                    </div>

                    <h5>SEO Tags</h5>

                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control"></textarea>
                </div>


                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control"> </textarea>
                </div>

               
                <div class="row">
                    {{-- <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div> --}}

                    <div class="col-md-3 mb-3">
                        <input type="checkbox" name="terms">
                        <label for="">Agree with <a href="/terms"> terms and conditions</a></label>
                    </div>


                    <div class="col-md-6">
                        <button  type="submit" name="post-button" class="btn-btn-primary">Submit</button>
                    </div>
                        


                    

                </form>
            </div>
        </div>

       

    
    </div>
    
@endsection