@extends('layout')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Feedbacks</h1>

        {{-- Display error messages if any --}}
        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>

        @endif

        {{-- display student details in a table --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Type</th>

                    <th>Content</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>


            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>

                    <td>{{$feedback->type}}</td>
                    <td>{{$feedback->anonymous ? 'Anonymous' : 'Identified'}}</td>
                    <td>{{$feedback->content}}</td>
                    <td>{{$feedback->is_reviewed ? 'Reviewed' : 'Pending'}}</td>
                    <td>
                        <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST">
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
    {{-- {{ $students->links() }} --}}

@endsection
