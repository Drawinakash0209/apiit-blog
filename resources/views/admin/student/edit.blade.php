@extends('layout')

@section('content')
    <div class="container-fluid px-4">



    <div class="card mt-4">
        <div class="card-header">
             <h4 class="">Edit Student</h4>

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



            <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" name="name" value="{{ old('name', $student->name) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Student Email</label>
                    <input type="text" name="email" value="{{ old('email', $student->email) }}" class="form-control">
                </div>

                @error('email')
                    <p class="mt-3 text-sm leading-6 text-red-600">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-3">
                    <label for="student_id" class="form-label">Student ID</label>
                    <input type="text" name="student_id" value="{{ old('student_id', $student->student_id) }}" class="form-control">
                </div>

                {{-- Batch code field --}}
                <div class="mb-3">
                    <label for="batch" class="form-label">Batch</label>
                    <input type="text" name="batch" value="{{ old('batch', $student->batch) }}" class="form-control">
                </div>

                {{-- A drop down option to change the is_approved to true and false --}}
                {{-- <div class="mb-3">
                    <label for="is_approved" class="form-label">Account Status</label>
                    <select name="is_approved" class="form-control">
                        <option value="1" {{ $student->is_approved ? 'selected' : '' }}>Activated</option>
                        <option value="0" {{ ! $student->is_approved ? 'selected' : '' }}>Diactivated</option>
                    </select>
                </div> --}}

                <div class="mb-3">
                    <label for="is_approved" class="form-label">Account Status</label>
                    <select name="is_approved" class="form-control">
                        <option value="1" {{ $student->is_approved == 1 ? 'selected' : '' }}>Activated</option>
                        <option value="0" {{ $student->is_approved == 0 ? 'selected' : '' }}>Deactivated</option>
                    </select>
                </div>

                {{-- <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug"value="{{$category->slug}}" class="form-control">
                </div> --}}

                {{-- <div class="mb-3">
                    <label for="description" class="form-label">Category Description</label>
                    <textarea name="description" rows="5" class="form-control">{{$category->description}}</textarea>
                </div> --}}

                {{-- <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div> --}}

                {{-- <h5>SEO Tags</h5> --}}

                {{-- <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{$category->meta_title}} class="form-control">
                </div> --}}

                {{-- <div class="mb-3">
                    <label for="description" class="form-label">Meta Description</label>
                    <textarea name="meta_description" rows="3"  class="form-control">{{$category->meta_description}}</textarea>
                </div> --}}


                {{-- <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control"> {{$category->meta_keywords}}</textarea>
                </div> --}}

                {{-- <h6>Status Mode</h6> --}}
                {{-- <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status" {{$category->navbar_status == '1' ? 'checked' : ''}}>
                    </div> --}}

                    {{-- <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{$category->status == '1' ? 'checked' : ''}}>
                    </div> --}}

                    <div class="col-md-6">
                        <button  type="submit" class="btn-btn-primary">Update student</button>
                    </div>




    </div>
</div>
@endsection