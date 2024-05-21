
@extends('student.dashboard')

@section('content')
    <div class="container-fluid px-4 mt-5">

        <div class="card">
            <div class="card-header ">
                <h4>View Albums
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
                <th>Album Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>


            </thead>
            <tbody>
            @foreach ($albums as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{$item->name}}</td>

              
                    <td>
                        <a href="{{'album-edit/'.$item->id}}" class="btn btn-success">Edit</a>
                    </td>

                    <td>
                        <a href="{{'album-delete/'.$item->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

            @endforeach

            </tbody>
    </div>

@endsection
