@extends('student.dashboard')

@section('content')
    <div class="container-fluid px-4 mt-5">

        <div class="card">
            <div class="card-header ">
                <h4>Events


                </h4>
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



                <form action="{{url('/add-events')}}" method="POST" enctype="multipart/form-data">


                    @csrf

                    <div class="mb-3">
                        <label for="type_of_event" class="form-label">Target Audience</label>
                        <select name="type_of_event" class="form-control">
                            <option value="All"> All </option>
                            <option value="Computing"> Computing School </option>
                            <option value="Business"> Business School </option>
                            <option value="Law"> Law School </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Event name" class="form-label">Event name</label>
                        <input type="text" name="name" class="form-control">
                    </div>



                    <div class="mb-3">
                        <label for="description" class="form-label">Event Description</label>
                        <textarea name="description" id="my_summernote" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date">
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date (optional)</label>
                        <input type="date" name="end_date">
                    </div>


                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="start_time" class="form-label">Start time</label>
                        <input type="time" name="start_time">
                    </div>



                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>




                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <input type="checkbox" name="terms">
                            <label for="">Agree with <a href="/terms"> terms and conditions</a></label>
                        </div>

                        <div class="col-md-6">
                            <button  type="submit" name="post-button" class="btn-btn-primary">Submit</button>
                        </div>

                </form>
            </div>
        </div>
    </div>

@endsection
