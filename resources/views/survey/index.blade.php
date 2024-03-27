
@extends('student.dashboard')

@section('content')

    <div class="container-fluid px-4 mt-5">

        <div class="card">
            <div class="card-header ">
                <h4>View Survey
                    <a href="{{url('/add-survey')}}" class="btn btn-primary float-end">Add Survey</a>
                </h4>
            </div>

            <div class="card-body">

                @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>     
                @endif    

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Survey Name</th>
                            <th>Link</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($surveys as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{$item->name}}</td>
                            <td><a href="{{$item->form_link}}">Form Link</a></td>
                            {{-- <td><a hre{{$item->form_link}}</td> --}}

                            <td>
                                <a href="{{'survey-edit/'.$item->id}}" class="btn btn-success">Edit</a>
                            </td>

                            <td>
                                <a href="{{'survey-delete/'.  $item->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

@endsection

