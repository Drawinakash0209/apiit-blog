{{-- 
<main class=" mt-24">
    <header class="container">
        <!-- Navbar -->
        <nav class="flex justify-between md:justify-around py-2 bg-white/80 backdrop-blur-md shadow-md w-full px-6 md:px-3 fixed top-0 left-0 right-0 z-10 px-8 md:px-3">
            <!-- Logo Container -->
            <div class="flex items-center">
                <!-- Logo -->
                <a class="cursor-pointer">
                    <h3 class="text-2xl font-medium text-blue-500">
                        <img class="w-80 h-20" src="https://lmd.lk/wp-content/uploads/2020/11/IMAGE-APIIT-Staffordshire.jpg" alt="Store Logo" />
                    </h3>
                </a>
            </div>
    
            <!-- Links Section -->
            <div class="items-center md:space-x-8 justify-center justify-items-start md:justify-items-center md:flex md:pt-2 w-full left-0 top-12 px-5 md:px-10 py-1 md:py-0 border-t md:border-t-0">
                <a class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">Home</a>
    
                <a class="flex text-gray-600 cursor-pointer transition-colors duration-300 font-semibold text-blue-600">Themes</a>
    
                <a class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">Developers</a>
    
                <a class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">Pricing</a>
    
                <a class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">Blog</a>
    
                <a class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">About Us</a>

                
            </div>
        




            <div class="flex items-center space-x-5 hidden md:flex">

              







            <div class="flex items-center space-x-5 hidden md:flex">
                @if(Auth::guard('student')->check())
                    <p class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                        {{ Auth::guard('student')->user()->name }}
                    </p>
            
                    <a href="/student/dashboard" class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                        Dashboard
                    </a>
                    
                    <form method="POST" action="{{ route('student.logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @elseif(Auth::guard('admin')->check())
                    <p class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                        {{ Auth::guard('admin')->user()->name }}
                    </p>
            
                    <a href="/admin/dashboard" class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                        Dashboard
                    </a>
                    
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('register') }}" class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                        Register
                    </a>
            
                    <a href="{{ route('student.login') }}" class="flex text-gray-600 cursor-pointer transition-colors duration-300 font-semibold text-blue-600">
                        Login
                    </a>
                @endif
            </div>
            

            
    
            <!-- Hamberger Menu -->
            <button class="w-10 h-10 md:hidden justify-self-end rounded-full hover:bg-gray-100">
                <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
                </svg>
            </button>
        </nav>
    </header>
    

</main> --}}



















<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
  <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
    <div class="p-4 flex flex-row items-center justify-between">
      <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"><img class="w-60 h-20" src="https://lmd.lk/wp-content/uploads/2020/11/IMAGE-APIIT-Staffordshire.jpg" alt="Store Logo" /></a>
      <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
          <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
      <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Home</a>
      <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/view-survey">Surveys</a>
      <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Life@APIIT</a>
      <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Contact</a>
      <div @click.away="open = false" class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
          <span><i class="fa-solid fa-user"></i></span>
          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
          <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">

































            @if(Auth::guard('student')->check())
            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">{{ Auth::guard('student')->user()->name }}</a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/student/dashboard">Dashboard</a>
            <form method="POST" action="{{ route('student.logout') }}">
                @csrf
                <button type="submit" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">Logout</button>
            </form>


            @elseif(Auth::guard('admin')->check())
            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">{{ Auth::guard('admin')->user()->name }}</a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/admin/dashboard">Dashboard</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">Logout</button>
            </form>

            @else

            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/student/login">Login</a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/student/register">Register</a>

            @endif


            
          </div>
        </div>
      </div>    
    </nav>
  </div>
</div>



