
@extends('student.dashboard')

@section('content')

    <div class="container-fluid px-4 mt-5">

        <div class="card">
            <div class="card-header ">
                <h4>View Applications</h4>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <strong>Complete: </strong> {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered sortable">
                <thead>
                <tr>
                    <th><a href="{{ route('job.applications', ['sortField' => 'id', 'sortDirection' => $sortField === 'id' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">ID</a></th>
                    <th><a href="{{ route('job.applications', ['sortField' => 'name', 'sortDirection' => $sortField === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
                    <th><a href="{{ route('job.applications', ['sortField' => 'email', 'sortDirection' => $sortField === 'email' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">Email</a></th>
                    <th><a href="{{ route('job.applications', ['sortField' => 'phone', 'sortDirection' => $sortField === 'phone' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">Phone</a></th>
                    <th><a href="{{ route('job.applications', ['sortField' => 'address', 'sortDirection' => $sortField === 'address' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">Address</a></th>
                    <th><a href="{{ route('job.applications', ['sortField' => 'created_at', 'sortDirection' => $sortField === 'created_at' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">Submitted At</a></th>
                    <th><a href="{{ route('job.applications', ['sortField' => 'job_name', 'sortDirection' => $sortField === 'job_name' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">Job Title</a></th>
                    <th>CV</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->name }}</td>
                        <td>{{ $application->email }}</td>
                        <td>{{ $application->phone }}</td>
                        <td>{{ $application->address }}</td>
                        <td>{{ $application->created_at }}</td>
                        <td>{{ $application->job->name }}</td>
                        <td><a href="{{ asset($application->image) }}" target="_blank">View/Download CV</a></td>
                        <td>
                            <form action="{{ route('application.delete', $application->id) }}" method="POST">
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

    </div>

    </div>

@endsection
