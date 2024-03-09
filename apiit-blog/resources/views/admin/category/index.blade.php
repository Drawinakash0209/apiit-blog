
@extends('layout')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>

        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>
            
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>


            </thead>
            <tbody>
                @foreach ($category as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->image}}</td>
                    <td>{{$item->status == '1' ? 'Hidden' : 'Show'}}</td>

                    <td>
                        <a href="{{'edit-category/'.  $item->id}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
                    
                @endforeach

            </tbody>
    </div>
    
@endsection