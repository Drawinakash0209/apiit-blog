@extends('layout')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admins</h1>

        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>

        @endif

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
                    {{-- <td>{{$item->status == '1' ? 'Hidden' : 'Show'}}</td> --}}

                    <td>
                        {{-- <a href="{{'edit-category/'.  $admin->id}}" class="btn btn-success">Edit</a> --}}
                        <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>

                        {{-- <a href="{{route('admin.destroy', $admin->id)}}" class="btn btn-danger">Delete</a> --}}
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
