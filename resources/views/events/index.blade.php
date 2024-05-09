
@extends('student.dashboard')

@section('content')
    <div class="container-fluid px-4 mt-5">

        <div class="card">
            <div class="card-header ">
                <h4>View posts
                </h4>
            </div>
        </div>

        {{-- Display error messages if any --}}
        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>
            
        @endif


        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Post Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>


            </thead>
            <tbody>
            @foreach ($events as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->image}}</td>
                    <td>{{$item->status == '1' ? 'Hidden' : 'Show'}}</td>

                    <td>
                        <a href="{{'event-edit/'.$item->id}}" class="btn btn-success">Edit</a>
                    </td>

                    <td>
                        <a href="{{'event-delete/'.$item->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

            @endforeach

            </tbody>
    </div>

@endsection
