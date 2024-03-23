
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
{{-- 
        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>

        @endif --}}


            <div class="card-header ">
                <h4>Add Survey

                    <a href="{{url('/add-survey')}}" class="btn btn-primary float-end">Add Survey</a>
                </h4>
            </div>
            
            <div class="card-body">
                <form action="{{url('/add-survey')}}" method="POST" enctype="multipart/form-data">

                    @csrf


             

                    <div class="mb-3">
                        <label for="Post name" class="form-label">Survey name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="Description" class="form-label">Form Link (iframe)</label>
                        <input type="text"  name="form_link" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" rows="4" class="form-control"></textarea>
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
                    <textarea name="cb_number" rows="1" class="form-control"> </textarea>
                </div>

                    <div class="col-md-6">
                        <button  type="submit" class="btn btn-primary float">Submit</button>
                    </div>  
                </form>

            </div>

        </div>

    </div>
 @endsection   