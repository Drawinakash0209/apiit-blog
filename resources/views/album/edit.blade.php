@extends('student.dashboard')

@section('content')
    <div class="container-fluid px-4 mt-5">

        <div class="card">
            <div class="card-header ">
                <h4>Albums


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



                <form action="{{url('album/update/'.$album->id)}}" method="POST" enctype="multipart/form-data">


                    @csrf
                    @method('PUT') <!-- Use PUT method for update -->


                    <div class="mb-3">
                        <label for="Event name" class="form-label">Album name</label>
                        <input type="text" name="name" class="form-control" value="{{$album->name}}">
                    </div>



                    <div class="mb-3">
                        <label for="description" class="form-label">Album Description</label>
                        <textarea name="description" id="my_summernote" rows="5" class="form-control">{{$album->description}}</textarea>
                    </div>



                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="gallery[]" class="form-control" multiple>
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
