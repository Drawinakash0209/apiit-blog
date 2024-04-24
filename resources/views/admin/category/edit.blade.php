@extends('layout')

@section('content')
    <div class="container-fluid px-4">
        
 

    <div class="card mt-4">
        <div class="card-header">
             <h4 class="">Edit Category</h4>

        </div>

        {{-- display error messages if any --}}
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
           
            

            <form action="{{url('/admin/update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="category_name" class="form-label">Category Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug"value="{{$category->slug}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Category Description</label>
                    <textarea name="description" rows="5" class="form-control">{{$category->description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <h5>SEO Tags</h5>

                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{$category->meta_title}} class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Meta Description</label>
                    <textarea name="meta_description" rows="3"  class="form-control">{{$category->meta_description}}</textarea>
                </div>


                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control"> {{$category->meta_keywords}}</textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status" {{$category->navbar_status == '1' ? 'checked' : ''}}>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{$category->status == '1' ? 'checked' : ''}}>
                    </div>

                    <div class="col-md-6">
                        <button  type="submit" class="btn-btn-primary">Submit</button>
                    </div>         
    </div>
</div>
@endsection