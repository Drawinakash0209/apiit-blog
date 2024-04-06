@extends('student.dashboard')
@section('content')


    <div class="container-fluid px-4 mt-5"> 
        <div class="card">
            <div class="card-header ">
                <h4>View posts

                    <a href="{{url('/add-post')}}" class="btn btn-primary float-end">Add Survey</a>
                </h4>
            </div>
        </div>

        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>
            
        @endif


        @unless ($surveys->isEmpty())

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Post Name</th>
                    <th>Status</th> 
                </tr>

                @foreach ($surveys as $survey)
            </thead>

            <tbody>
                <tr>
                    <td>{{ $survey->id }}</td>
                    <td>{{$survey->name}}</td>
                    {{-- <td>{{$survey->image}}</td> --}}
                    {{-- <td>{{$post->status == '1' ? 'Hidden' : 'Approved'}}</td> --}}
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