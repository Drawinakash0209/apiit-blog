@extends('layout')

@section('content')
    <div class="container-fluid px-4">



    <div class="card mt-4">
        <div class="card-header">
             <h4 class="">Create New Student</h4>

        </div>

        <div class="card-body">


            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



            <form action="{{ route('student.store', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Student Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $student->name) }}" class="form-control">
                </div>

                {{-- Student id field--}}
                <div class="mb-3">
                    <label for="student_id" class="form-label">Student ID</label>
                    <input type="text" name="student_id" value="{{ old('student_id', $student->student_id) }}" class="form-control">
                </div>

                {{-- Batch code field --}}
                <div class="mb-3">
                    <label for="batch" class="form-label">Batch</label>
                    <input type="text" name="batch" value="{{ old('batch', $student->batch) }}" class="form-control">
                </div>


                <div class="mb-3">
                    <label for="email" class="form-label">Student Email</label>
                    <input type="text" name="email" value="{{ old('email', $student->email) }}" class="form-control">
                </div>

                {{-- <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Category Description</label>
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <h5>SEO Tags</h5>

                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control"></textarea>
                </div> --}}


                {{-- <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control"> </textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div> --}}

                    <div class="col-md-6">
                        <button  type="submit" class="btn-btn-primary">Create Student</button>
                    </div>




    </div>
</div>
@endsection