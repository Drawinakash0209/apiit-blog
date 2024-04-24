@extends('layout')

@section('content')
    <div class="container-fluid px-4">



    <div class="card mt-4">
        <div class="card-header">
             <h4 class="">Create New {{ $userType}}</h4>

        </div>
        <div class="card-body">

{{--           error message--}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            {{--Form to create users--}}
        <form action="{{ route('user.store', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">User Email</label>
                <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control">
            </div>

            @error('email')
                <p class="mt-3 text-sm leading-6 text-red-600">
                    {{ $message }}
                </p>
            @enderror

            @foreach ($uniqueFields as $field => $label)
                @if (in_array($field, ['cb_number','batch', 'school', 'level', 'degree']) && $userType === 'student')
                    <div class="mb-3">
                        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                        <input type="text" name="{{ $field }}" value="{{ old($field, $user->{$field}) }}" class="form-control">
                    </div>
                @elseif (in_array($field, ['nic','school', 'school', 'degree', 'graduated_year']) && $userType === 'alumni')
                    <div class="mb-3">
                        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                        <input type="text" name="{{ $field }}" value="{{ old($field, $user->{$field}) }}" class="form-control">
                    </div>
                @elseif (in_array($field, ['school']) && $userType === 'lecturer')
                    <div class="mb-3">
                        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                        <input type="text" name="{{ $field }}" value="{{ old($field, $user->{$field}) }}" class="form-control">
                    </div>
                @endif
            @endforeach

        <div class="mb-3">
          <label for="is_approved" class="form-label">Account Status</label>
          <select name="is_approved" class="form-control">
            <option value="1" >Activated</option>
            <option value="0" >Deactivated</option>
          </select>
        </div>

        <input type="hidden" name="user_type" value="{{ $userType }}">
            <div class="col-md-6">
                <button  type="submit" class="btn-btn-primary">Create user</button>
            </div>

    </div>
</div>
@endsection
