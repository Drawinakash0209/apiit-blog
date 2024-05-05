@extends('layout')

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

                <div class="card-header ">
                    <h4>Edit Jobs</h4>
                </div>


                        <!-- Success Message -->
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Task Complete!</strong> Job added successfully
                        </div>
                    @endif

                    <!-- Add Job Form -->
                        <form action="{{ url('job/update/'.$job->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            @method('PUT') <!-- Use PUT method for update -->
                            <div class="mb-3">
                                <label for="jobname" class="form-label">Job Title</label>
                                <input type="text" name="name" value="{{ $job->name }}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="joblink" class="form-label">Job Link</label>
                                <input type="text"  name="form_link" value="{{ $job->form_link }}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="jobtype" class="form-label">Job Type</label>
                                <select name="job_type" class="form-select">
                                    <option value="internship" {{ $job->job_type === 'internship' ? 'selected' : '' }}>Internship</option>
                                    <option value="full-time" {{ $job->job_type === 'full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="part-time" {{ $job->job_type === 'part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="freelance" {{ $job->job_type === 'freelance' ? 'selected' : '' }}>Freelance</option>
                                    <option value="contract" {{ $job->job_type === 'contract' ? 'selected' : '' }}>Contract</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jobdesc" class="form-label">Job Description</label>
                                <textarea name="description" rows="4" class="form-control">{{ $job->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" class="form-select">
                                    <option value="computing" {{ $job->category === 'computing' ? 'selected' : '' }}>Computing</option>
                                    <option value="business" {{ $job->category === 'business' ? 'selected' : '' }}>Business</option>
                                    <option value="law" {{ $job->category === 'law' ? 'selected' : '' }}>Law</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Update Job</button>
                            </div>
                        </form>
                </div>

        </div>
    </div>
@endsection
