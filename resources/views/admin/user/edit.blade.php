@extends('layout')

@section('content')
<div class="container-fluid px-4">

  <div class="card mt-4">
    <div class="card-header">
      <h4 class="">Edit {{ $userType }}</h4>
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

      <form action="{{ route('user.update', [$user->id, $userType]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($userType !== 'staff')
          <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
          </div>
        @endif

        <div class="mb-3">
          <label for="email" class="form-label">User Email</label>
          <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control">
        </div>

        @error('email')
          <p class="mt-3 text-sm leading-6 text-red-600">
            {{ $message }}
          </p>
        @enderror

        @foreach ($uniqueFields as $field => $details)

            @if ($field === 'cb_number' || $field === 'batch' || $field === 'degree')
                <div class="mb-3">
                    <label for="{{ $field }}" class="form-label">{{ $details }}</label>
                    <input type="text" name="{{ $field }}" value="{{ old($field, $user->$field) }}" class="form-control">
                </div>

            @elseif ($field === 'role')
                <div class="mb-3">
                    <label for="{{ $field }}" class="form-label">{{ $details['label'] }}</label>
                    <select name="{{ $field }}" class="form-control">
                        @foreach ($details['options'] as $option)
                            <option value="{{ $option }}" {{ $user->name === $option ? 'selected' : '' }}>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>

            @elseif ($field === 'nic' || $field === 'graduated_year')
                <div class="mb-3">
                    <label for="{{ $field }}" class="form-label">{{ $details }}</label>
                    <input type="text" name="{{ $field }}" value="{{ old($field, $user->$field) }}" class="form-control">
                </div>
{{--              @elseif ($field === 'school')--}}
{{--                  <div class="mb-3">--}}
{{--                      <label for="{{ $field }}" class="form-label">{{ $details }}</label>--}}
{{--                      <input type="text" name="{{ $field }}" value="{{ old($field, $user->$field) }}" class="form-control">--}}
{{--                  </div>--}}
            @elseif ($field === 'school' || $field === 'level')
                <div class="mb-3">
                    <label for="{{ $field }}" class="form-label">{{ $details['label'] }}</label>
                    <select name="{{ $field }}" class="form-control">
                        @foreach ($details['options'] as $option)
                            <option value="{{ $option }}"
                                    @if (old($field, $user->$field) == $option) selected @endif>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

        @endforeach

        <div class="mb-3">
          <label for="is_approved" class="form-label">Account Status</label>
          <select name="is_approved" class="form-control">
            <option value="1" {{ $user->is_approved == 1 ? 'selected' : '' }}>Activated</option>
            <option value="0" {{ $user->is_approved == 0 ? 'selected' : '' }}>Deactivated</option>
          </select>
        </div>

        <input type="hidden" name="user_type" value="{{ $userType }}">

        <div class="col-md-6">
          <button type="submit" class="btn btn-primary">Update User</button>
        </div>

      </form>
    </div>
  </div>
</section>
@endsection
