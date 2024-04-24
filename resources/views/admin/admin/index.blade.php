@extends('layout')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admins</h1>

        {{-- Display error messages if any --}}
        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>

        @endif


        {{-- Table format for CRUD operations --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>


            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>


                    <td>

                        <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>

                       
                        <form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
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
    {{ $admins->links() }}

@endsection
