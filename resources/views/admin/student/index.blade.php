@extends('layout')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Students</h1>

        {{-- Display error messages if any --}}
        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>

        @endif

        {{-- display student details in a table --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Batch</th>
                    <th>Email</th>
                    <th>Account Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>


            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->student_id}}</td>
                    <td>{{$student->batch}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->is_approved ? 'Activated' : 'Diactivated'}}</td>
                    <td>
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
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
    {{ $students->links() }}

@endsection
