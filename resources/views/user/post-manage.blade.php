{{-- <header class="flex justify-between items-center pl-10 pr-10 pb- 20 rounded mt-40">
    <h1 class="text-3xl text-center font-bold my-6 uppercase">
        Manage Your Indoors
    </h1>

    <a href="/home/create" class="mt-8  text-blue-400  text-base font-semibold py-2.5 px-6 border-2 border-white rounded hover:bg-white hover:text-black transition duration-300 ease-in-out">
        <i class="fa-solid fa-plus"></i> Add Indoor
    </a>
</header>


    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless ($posts->isEmpty())
            @foreach ($posts as $post)


                
           
            <tr class="border-gray-300">
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="show.html">
                        {{$post->name}}
                    </a>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a
                        href="/home/{{$post->id}}/edit"
                        class="text-blue-400 px-6 py-2 rounded-xl"
                        ><i
                            class="fa-solid fa-pen-to-square"
                        ></i>
                        Edit</a
                    >
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                <form action="/home/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i
                        class="fa-solid fa-trash-can"
                    ></i>
                    Delete</button>
                  
                  </section>
                </td>
            </tr>

            @endforeach
            @else
            <tr class="border-grey-300">
                <td class="px-4 py-8 border-t border-b border grey-300 text-lg">
                    <p class="text-center">
                        You have no Indoors yet.
                </td>
            </tr>
            @endunless

        </tbody>
    </table>
</div> --}}



@extends('student.dashboard')

@section('content')

    <div class="container-fluid px-4 mt-5">
       
        <div class="card">
            <div class="card-header ">
                <h4>View posts

                    <a href="{{url('/add-post')}}" class="btn btn-primary float-end">Add Post</a>
                </h4>
            </div>
        </div>

        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>
            
        @endif

        @unless ($posts->isEmpty())

        <table class="table table-bordered">
            <thead>
                @foreach ($posts as $post)

                <tr>
                    <th>ID</th>
                    <th>Post Name</th>
                    <th>Image</th>
                    <th>Status</th>
                  
                </tr>


            </thead>
            <tbody>
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->image}}</td>
                    <td>{{$post->status == '1' ? 'Hidden' : 'Approved'}}</td>

                </tr>
                    
                @endforeach

            </tbody>

            @else
            <tr class="border-grey-300">
                <td class="px-4 py-8 border-t border-b border grey-300 text-lg">
                    <p class="text-center">
                        You have no blogs yet.
                </td>
            </tr>

            @endunless
    </div>
    
@endsection