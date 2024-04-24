@extends('layout')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pending Students</h1>


        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>

        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Batch</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>


            </thead>
            <tbody>
                @foreach ($pendingstudents as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->student_id}}</td>
                    <td>{{$student->batch}}</td>
                    <td>{{$student->email}}</td>

                    <td>
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
    
                            {{-- Delete button --}}
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>

                @endforeach


            </tbody>

        </table>
    </div>


@endsection
