
@extends('layout')

@section('content')
    <div class="container-fluid px-4 mt-5">
       
        <div class="card">
            <div class="card-header ">
                <h4>View reports

                    {{-- <a href="{{url('/add-post')}}" class="btn btn-primary float-end">Add Post</a> --}}
                </h4>
            </div>
        </div>

        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>
            
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Submitted User</th>
                    <th>post_id</th>
                    <th>title</th>
                    <th>issue_type</th>
                    <th>description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>


            </thead>
            <tbody>
                @foreach ($reports as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{$item->student_id}}</td>
                    <td>{{$item->post_id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->issue_type}}</td>
                    <td>{{$item->description}}</td>
                    
              

                    <td>
                        <a href="{{'post-edit/'.$item->id}}" class="btn btn-success">Edit</a>
                    </td>

                    <td>
                        <a href="{{'post-delete/'.  $item->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                    
                @endforeach

            </tbody>
    </div>
    
@endsection