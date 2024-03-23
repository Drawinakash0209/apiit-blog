
@extends('layout')

@section('content')

    <div class="container-fluid px-4 mt-5">

        <div class="card">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="card-header ">
                <h4>Edit Survey </h4>
            </div>
            
            <div class="card-body">
                <form action="{{url('update-survey/'.$survey->id)}}" method="POST" enctype="multipart/form-data">

                    @method('PUT')

                    @csrf


                    <div class="mb-3">
                        <label for="Post name" class="form-label">Survey name</label>
                        <input type="text" name="name" value= "{{$survey->name}}"class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" value="{{$survey->slug}}"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="Description" class="form-label">Form Link (iframe)</label>
                        <input type="text"  name="v_iframe" value="{{$survey->v_frame}}" class="form-control">
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

                <div class="mb-3">
                    <label for="">CB Number</label>
                    <textarea name="meta_keywords" rows="1" value="{{$survey->meta_keywords}}"   class="form-control"> </textarea>
                </div>

                    <div class="col-md-6">
                        <button  type="submit" class="btn btn-primary float">Update Survey</button>
                    </div>  
                </form>

            </div>

        </div>

    </div>
 @endsection   