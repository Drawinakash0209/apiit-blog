
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
                <h4>Edit Survey
                </h4>
            </div>

            <div class="card-body" >
                @if(session()->has('message'))
                                <div class="alert alert-success" role="alert">
                                    <strong>Well done!</strong> product add successfully.
                                </div>
                @endif


                <form action="{{url('/edit-update-survey/'.$survey->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')

                    @csrf

                    <div class="mb-3">
                        <label for="Post name" class="form-label">Survey name</label>
                        <input type="text" name="name" value="{{$survey->name}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Form Link (iframe)</label>
                        <input type="text"  name="form_link" class="form-control"
                        value="{!!$survey->form_link!!}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" rows="4" class="form-control" >{{$survey->description}}</textarea>
                    </div>


                    <div class="mb-3">
                        <label for="">Created by</label>
                        <input type="text" name="crated_by" class="form-control" value="{{$survey->crated_by}}">
                    </div>

                    <div class="mb-3">
                        <label for="">Date</label>
                        <input type="text" name="cb_number" class="form-control" value="{{$survey->cb_number}}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>

                    <div class="col-md-6">
                        <button  type="submit" class="btn btn-primary float">Edit Survey</button>
                    </div>
                </form>

            </div>

        </div>

    </div>
 @endsection
