
@extends('student.dashboard')

@section('content')

    <div class="container-fluid px-4 mt-5">

        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Heading -->
            <div class="card-header ">
                <h4>Add Jobs</h4>
            </div>


                <!-- Success Message -->
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Task Complete!</strong> Job added successfully
                        </div>
                    @endif


                    <!-- Add Job Form -->
                        <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                            <div class="mb-3">
                                <label for="jobname" class="form-label">Job Title</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="jobtype" class="form-label">Job Type</label>
                                <select name="job_type" class="form-select">
                                    <option value="full-time">Internship</option>
                                    <option value="part-time">Part-time</option>
                                    <option value="full-time">Full-time</option>
                                    <option value="freelance">Freelance</option>
                                    <option value="contract">Contract</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jobdesc" class="form-label">Job Description</label>
                                <textarea name="description" rows="4" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" class="form-select">
                                    <option value="computing">Computing</option>
                                    <option value="business">Business</option>
                                    <option value="law">Law</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary float">Submit</button>
                            </div>

                        </form>
                </div>

        </div>
    </div>

@endsection
