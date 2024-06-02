
@extends('student.dashboard')

@section('content')

    <div class="container-fluid px-4 mt-5">

        <div class="card">
            <div class="card-header ">
                <h4>View Jobs
                    <a href="{{url('/jobs/create')}}" class="btn btn-primary float-end">Add a Job</a>
                </h4>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <strong>Complete: </strong> {{ session('success') }}
                </div>
            @endif
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Job Title</th>
                        <th>Job Description</th>
                        <th>Job Type</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->id }}</td>
                            <td>{{ $job->name }}</td>
                            <td>{{ $job->description }}</td>
                            <td>{{ $job->job_type }}</td>
                            <td>{{ $job->category }}</td>

                            <td>
                                <form action="{{ route('job.edit', ['job_id' => $job->id]) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </form>
                            </td>

                            <td>
                                <form action="{{ route('job.delete', ['job_id' => $job->id]) }}" method="POST">
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
