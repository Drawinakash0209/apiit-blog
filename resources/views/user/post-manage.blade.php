@extends('student.dashboard')
@section('content')


    <div class="container-fluid px-4 mt-5"> 
        <div class="card">
            <div class="card-header ">
                <h4>View posts

                    <a href="{{url('/add-post')}}" class="btn btn-primary float-end">Add Post</a>
                </h4>
            </div>
        </div>

        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>
            
        @endif


        @unless ($posts->isEmpty())

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Post Name</th>
                    <th>Image</th>
                    <th>Status</th> 
                </tr>

                @foreach ($posts as $post)
            </thead>

            <tbody>
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->image}}</td>
                    <td>{{$post->status == '1' ? 'Hidden' : 'Approved'}}</td>
                </tr>
                    
                @endforeach
            </tbody>

            @else

            <tr class="border-grey-300">
                <td class="px-4 py-8 border-t border-b border grey-300 text-lg">
                    <p class="text-center"> You have no blogs yet </p>
                </td>
            </tr>
            @endunless
    </div>
    
@endsection