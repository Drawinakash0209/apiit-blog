
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdn.tailwindcss.com"></script>

<head>



<style>
  #social-links ul li {
      display: inline;
      margin-right: 10px;
  }

</style>

</head>


@livewireStyles


<div class="max-w-screen-lg mx-auto">











































    <main class="mt-10">

      <div class="mb-4 md:mb-0 w-full mx-auto relative">
        <div class="px-4 lg:px-0">
          <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
           {{$blog->name}}
          </h2>

          <a
            href="#"
            class="py-2 text-green-700 inline-flex items-center justify-center mb-2"
          >
            {{ $category->name}}
          </a>
        </div>

        <img src="/uploads/post/{{$blog->image}}" class="w-full object-cover lg:rounded" style="height: 28em;"/>
      </div>




      <div class="flex flex-col lg:flex-row lg:space-x-12">

        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
            {!! $blog->description !!}

            <livewire:like-button :key="$blog->id" :$blog />

            @guest
                <p>Please <a href="{{route('login') }} ">log in</a> to like and comment on this post.</p>
            @endguest




            <livewire:post-comments :key="'comments' .$blog->id" :$blog />



        </div>




        <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
          <div class="p-4 border-t border-b md:border md:rounded">
            <div class="flex py-2">
              <img src="https://randomuser.me/api/portraits/men/97.jpg"
                class="h-10 w-10 rounded-full mr-2 object-cover" />
              <div>
                <p class="font-semibold text-gray-700 text-sm"> Mike Sullivan </p>
                <p class="font-semibold text-gray-600 text-xs"> Editor </p>
              </div>
            </div>
            <p class="text-gray-700 py-3">
              Mike writes about technology
              Yourself required no at thoughts delicate landlord it be. Branched dashwood do is whatever it.
            </p>
            <button class="px-2 py-1 text-gray-100 bg-green-700 flex w-full items-center justify-center rounded">
              Follow
              <i class='bx bx-user-plus ml-2' ></i>
            </button>
          </div>

          <div class="mt-4">
            <p class="text-gray-600">Share this post:</p>
            {!! $shareButtons !!}
        </div>
        </div>


      </div>
    </main>
    <!-- main ends here -->



    {{-- Report Blog Issue --}}
    <div class="mx-4 card bg-white max-w-md p-10 md:rounded-lg my-8 mx-auto">
      <button id="showFormBtn" class="w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none">Report Blog Issue</button>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <form id="reportForm" action="{{ route('report.blog.issue') }}" method="POST" style="display: none;">
          @csrf
          <div class="title">
              <h1 class="font-bold text-center">Report Blog Issue</h1>
          </div>
          <input type="hidden" name="post_id" value="{{ $blog->id }}">

          <div class="options md:flex md:space-x-6 text-sm items-center text-gray-700 mt-4">
              <p class="w-1/2 mb-2 md:mb-0">Type of Issue:</p>
              <select name="issue_type" class="w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500">
                  <option value="select" selected>Select an option</option>
                  <option value="inappropriate">Inappropriate Content</option>
                  <option value="false_info">False Information</option>
                  <option value="other">Other</option>
              </select>
          </div>

          <div class="form mt-4">
              <div class="flex flex-col text-sm">
                  <label for="title" class="font-bold mb-2">Title</label>
                  <input name="title" class="appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500" type="text" placeholder="Enter a title">
              </div>

              <div class="text-sm flex flex-col">
                  <label for="description" class="font-bold mt-4 mb-2">Description</label>
                  <textarea name="description" class="appearance-none w-full border border-gray-200 p-2 h-40 focus:outline-none focus:border-gray-500" placeholder="Enter your description"></textarea>
              </div>
          </div>

          <div class="submit">
              <button type="submit" class="w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none">Submit</button>
          </div>

          <!-- Close button -->
          <button id="closeFormBtn" type="button" class="w-full bg-red-600 text-white px-4 py-2 hover:bg-red-700 mt-4 text-center font-semibold focus:outline-none">Close</button>
      </form>
  </div>

  <script>
      // Function to show the form
      function showForm() {
          document.getElementById('showFormBtn').style.display = 'none';
          document.getElementById('reportForm').style.display = 'block';
      }

      // Function to close the form
      function closeForm() {
          document.getElementById('showFormBtn').style.display = 'block';
          document.getElementById('reportForm').style.display = 'none';
      }

      // Add event listeners to the buttons
      document.getElementById('showFormBtn').addEventListener('click', showForm);
      document.getElementById('closeFormBtn').addEventListener('click', closeForm);
  </script>



































      <div class="flex flex-wrap items-center justify-between mb-8">
          <h2 class="mr-10 text-4xl font-bold leading-none md:text-5xl">
             Releted blogs
          </h2>
      </div>

      <div class="flex flex-wrap -mx-4">

        @foreach ($relatedPosts as $blog)
          <div class="w-full max-w-full mb-8 sm:w-1/2 px-4 lg:w-1/3 flex flex-col">
              <img src="/uploads/post/{{$blog->image}}" alt="Card img" class="object-cover object-center w-full h-48" />
              <div class="flex flex-grow">
                  <div class="triangle"></div>
                  <div class="flex flex-col justify-between px-4 py-6 bg-white border border-gray-400 text">
                      <div>
                          <a  href="/home/{{$blog['id']}}"
                              class="inline-block mb-4 text-xs font-bold capitalize border-b-2 border-blue-600 hover:text-blue-600">Reliable
                              Schemas</a>
                          <a href="/home/{{$blog['id']}}"
                              class="block mb-4 text-2xl font-black leading-tight hover:underline hover:text-blue-600">
                              {{$blog['name']}}
                          </a>
                          <p class="mb-4">
                            {!! Str::limit(strip_tags($blog->description), 250) !!}
                          </p>
                      </div>
                      <div>
                          <a href="/home/{{$blog['id']}}"
                              class="inline-block pb-1 mt-2 text-base font-black text-blue-600 uppercase border-b border-transparent hover:border-blue-600">Read
                              More -></a>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach


      </div>

  </div>


  @livewireScripts
