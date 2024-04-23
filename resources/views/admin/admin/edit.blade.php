@extends('layout')

@section('content')
    <div class="container-fluid px-4">



    <div class="card mt-4">
        <div class="card-header">
             <h4 class="">Edit Admins</h4>

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



            <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Admin Name</label>
                    <input type="text" name="name" value="{{ old('name', $admin->name) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Admin Email</label>
                    <input type="text" name="email" value="{{ old('email', $admin->email) }}" class="form-control">
                </div>


                    <div class="col-md-6">
                        <button  type="submit" class="btn-btn-primary">Update Admin</button>
                    </div>




    </div>
</div>
@endsection
