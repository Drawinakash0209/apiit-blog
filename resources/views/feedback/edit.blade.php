@extends('student.dashboard')

@section('content')
    <div class="container-fluid px-4">



    <div class="card mt-4">
        <div class="card-header">
             <h4 class="">Edit Feedback</h4>

        </div>

        {{-- Display error messages if any --}}
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



            {{-- Display form to update student details --}}
            <form action="{{ route('feedback.update', $feedback->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="id" class="form-label">Feedback ID</label>
                    <input type="text" name="id" value="{{ old('id', $feedback->id) }}" class="form-control" readonly>
                </div>

                {{-- If the feadback is not anonymous display an email field --}}
                @if (!$feedback->anonymous)
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', $feedback->user->email) }}" class="form-control" readonly>
                    </div>
                @endif


                <div class="mb-3">
                    <label for="type" class="form-label">Category</label>
                    <select name="type" class="form-control">
                        <option value="Compliment" {{ $feedback->type == 'Compliment' ? 'selected' : '' }}>Compliment</option>
                        <option value="Suggestion" {{ $feedback->type == 'Suggestion' ? 'selected' : '' }}>Suggestion</option>
                        <option value="Complaint" {{ $feedback->type == 'Complaint' ? 'selected' : '' }}>Complaint</option>
                    </select>
                </div>

                @error('type')
                    <p class="mt-3 text-sm leading-6 text-red-600">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" name="content" value="{{ old('content', $feedback->content) }}" class="form-control">
                </div>
                @error('content')
                    <p class="mt-3 text-sm leading-6 text-red-600">
                        {{ $message }}
                    </p>
                @enderror


                <div class="mb-3">
                    <label for="is_reviewed" class="form-label">Status</label>
                    <select name="is_reviewed" class="form-control">
                        <option value="1" {{ $feedback->is_reviewed == 1 ? 'selected' : '' }}>Reviewed</option>
                        <option value="0" {{ $feedback->is_reviewed == 0 ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>
                    <div class="col-md-6">
                        <button  type="submit" class="btn-btn-primary">Update feedback</button>
                    </div>




    </div>
</div>
@endsection
