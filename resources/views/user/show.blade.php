
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdn.tailwindcss.com"></script>

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

      <div class="mt-4">
          <p class="text-gray-600">Share this post:</p>
          {!! $shareButtons !!}
      </div>
  

      <div class="flex flex-col lg:flex-row lg:space-x-12">

        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
            {!! $blog->description !!}

            <livewire:like-button :key="$blog->id" :$blog />

            <livewire:post-comments :key="'comments' .$blog->id" :$blog />


        </div>
       
       
        
{{-- 
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
        </div> --}}
       

      </div>
    </main>
    <!-- main ends here -->


  
  </div>
  @livewireScripts