@extends('layout')

@section('content')
    <div class="container-fluid px-4">

        @if (session('message'))

        <div class="alert alert-success mt-4">{{ session('message')}}</div>

        @endif

        @if (count($students) > 0)
            <h2 class="mt-4">Students</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>CB Number</th>
                        <th>Level</th>
                        <th>School</th>
                        <th>Degree</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->cb_number }}</td>
                            <td>{{ $student->level }}</td>
                            <td>{{ $student->school }}</td>
                            <td>{{ $student->degree }}</td>
                            <td>{{$student->is_approved ? 'Activated' : 'Diactivated'}}</td>

                            <td>
                                <a href="{{ route('user.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                            </td>

                            <td>
                                <form action="{{ route('user.destroy', $student->id) }}" method="POST">
                                {{-- <form action="{{ route('user.destroy', [$student->id, $student->user_type]) }}" method="POST"> --}}
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{-- Alumni section --}}
        @if (count($alumni) > 0)
            <h2 class="mt-4">Alumni</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>NIC</th>
                        <th>School</th>
                        <th>Degree</th>
                        <th>Graduated Year</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumni as $alumnus)
                        <tr>
                            <td>{{ $alumnus->name }}</td>
                            <td>{{ $alumnus->nic }}</td>
                            <td>{{ $alumnus->school }}</td>
                            <td>{{ $alumnus->degree }}</td>
                            <td>{{ $alumnus->graduated_year }}</td>
                            <td>{{$alumnus->is_approved ? 'Activated' : 'Diactivated'}}</td>

                            <td>
                                <a href="{{ route('user.edit', $alumnus->id) }}" class="btn btn-primary">Edit</a>
                            </td>

                            <td>
                                <form action="{{ route('user.destroy', $alumnus->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{-- Lecturer section --}}
        @if (count($lecturers) > 0)
            <h2 class="mt-4">Lecturers</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>School</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lecturers as $lecturer)
                        <tr>
                            <td>{{ $lecturer->name }}</td>
                            <td>{{ $lecturer->email }}</td>
                            <td>{{ $lecturer->school }}</td>
                            <td>{{$lecturer->is_approved ? 'Activated' : 'Diactivated'}}</td>

                            <td>
                                <a href="{{ route('user.edit', $lecturer->id) }}" class="btn btn-primary">Edit</a>
                            </td>

                            <td>
                                <form action="{{ route('user.destroy', $lecturer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{-- No users found message (optional) --}}
        @if (empty($students) && empty($alumni) && empty($lecturers))
            <div class="alert alert-info">No users found for the selected type.</div>
        @endif
    </div>
    {{-- {{ $students->links() }} --}}

@endsection
