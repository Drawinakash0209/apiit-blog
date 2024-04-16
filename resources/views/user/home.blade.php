<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Apiit Blog</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="user/images/apiit-favicon.png" type="image/x-icon" />

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="user/css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="user/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="user/style.css" rel="stylesheet">

<link href="user/nav-bar.css" rel="stylesheet">


<!-- Responsive styles for this template -->
<link href="user/css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="user/css/colors.css" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Version Garden CSS for this template -->
<link href="user/css/version/garden.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<!-- Animated footer script -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>





@include('user.navbar')





<div class="relative overflow-hidden bg-cover bg-no-repeat" style="
  background-position: 50%;
  background-image: url('user/images/graduation.jpg');
  height: 500px;
  z-index: -1; /* Move the background section behind the navbar */
">
  <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.60)] bg-fixed">
    <div class="flex h-full items-center justify-center">
      <div class="px-6 text-center text-red-500 md:px-12"> <h1 class="mt-2 mb-16 text-white text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl">
          Unlocking Knowledge, Inspiring Excellence <br /><span>APIIT</span>
        </h1>
      </div>
    </div>
  </div>
<<<<<<< HEAD
<<<<<<< HEAD
</div>
=======
=======
>>>>>>> parent of 04a2c01 (Home-categories)
</div> 


{{-- 
 <div class="flex justify-center items-center">
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
    <div class="2xl:mx-auto 2xl:container lg:px-20 lg:py-0 md:py-12 md:px-6 py-9 px-4 w-96 sm:w-auto">
      <div role="main" class="flex flex-col items-center justify-center">
        <h1 class="text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50">This Week Blogs</h1>
        <p class="text-base leading-normal text-center text-gray-600 dark:text-white mt-4 lg:w-1/2 md:w-10/12 w-11/12">If you're looking for random paragraphs, you've come to the right place. When a random word or a random sentence isn't quite enough</p>
      </div>
      <div class="lg:flex items-stretch md:mt-12 mt-8">
        <div class="lg:w-1/2">
          <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6">
            <div class="sm:w-1/2 relative">
              <div>
                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$mainBlogs[1]['created_at']->format('Y-m-d') }}</p>
                <div class="absolute bottom-0 left-0 p-6">
                  <h2 class="text-xl font-semibold 5 text-white">{{$mainBlogs[1]['name'] }}</h2>
                  <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[1]['category_id'] }}</p>
                  <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[1]['created'] }}</p>
                  <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </a>
                </div>
              </div>
              <img src="/uploads/post/{{$mainBlogs[1]->image}}" class="w-full" alt="chair" />
            </div>


            <div class="sm:w-1/2 sm:mt-0 mt-4 relative">
              <div>
                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$mainBlogs[2]['created_at']->format('Y-m-d') }}</p>
                <div class="absolute bottom-0 left-0 p-6">
                  <h2 class="text-xl font-semibold 5 text-white">{{$mainBlogs[2]['name'] }}</h2>
                  <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[2]['category_id'] }}</p>
                  <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[2]['created'] }}</p>
                  <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </a>
                </div>
              </div>
              <img src="/uploads/post/{{$mainBlogs[2]->image}}" class="w-full" alt="wall design" />
            </div>
          </div>


          <div class="relative">
            <div>
              <p class="md:p-10 p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$mainBlogs[3]['created_at']->format('Y-m-d') }}</p>
              <div class="absolute bottom-0 left-0 md:p-10 p-6">
                <h2 class="text-xl font-semibold 5 text-white">{{$mainBlogs[3]['name'] }}</h2>
                <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[3]['category_id'] }}</p>
                <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[3]['created'] }}</p>
                <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                  <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                  <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </a>
              </div>
            </div>
            <img src="/uploads/post/{{$mainBlogs[3]->image}}" alt="sitting place" class="w-full mt-8 md:mt-6 hidden sm:block" />
            <img class="w-full mt-4 sm:hidden" src="https://i.ibb.co/6XYbN7f/Rectangle-29.png" alt="sitting place" />
          </div>

        </div>

        <div class="lg:w-1/2 xl:ml-8 lg:ml-4 lg:mt-0 md:mt-6 mt-4 lg:flex flex-col justify-between">
          <div class="relative">
            <div>
              <p class="md:p-10 p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$mainBlogs[4]['created_at']->format('Y-m-d') }}</p>
              <div class="absolute bottom-0 left-0 md:p-10 p-6">
                <h2 class="text-xl font-semibold 5 text-white">{{$mainBlogs[4]['name'] }}</h2>
                <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[4]['category_id'] }}</p>
                <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[4]['created'] }}</p>
                <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                  <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                  <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </a>
              </div>
            </div>
            <img src="/uploads/post/{{$mainBlogs[4]->image}}" alt="sitting place" class="w-full sm:block hidden" />
            <img class="w-full sm:hidden" src="https://i.ibb.co/dpXStJk/Rectangle-29.png" alt="sitting place" />
          </div>

          <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6 md:mt-6 mt-4">
            <div class="relative w-full">
              <div>
                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$mainBlogs[5]['created_at']->format('Y-m-d') }}</p>
                <div class="absolute bottom-0 left-0 p-6">
                  <h2 class="text-xl font-semibold 5 text-white">{{$mainBlogs[5]['name'] }}</h2>
                  <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[5]['category_id'] }}</p>
                  <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[5]['created'] }}</p>
                  <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </a>
                </div>
              </div>
              <img src="/uploads/post/{{$mainBlogs[5]->image}}" class="w-full" alt="chair" />
            </div>

            <div class="relative w-full sm:mt-0 mt-4">
              <div>
                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$mainBlogs[6]['created_at']->format('Y-m-d') }}</p>
                <div class="absolute bottom-0 left-0 p-6">
                  <h2 class="text-xl font-semibold 5 text-white">{{$mainBlogs[6]['name'] }}</h2>
                  <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[6]['category_id'] }}</p>
                  <p class="text-base leading-4 text-white mt-2">{{$mainBlogs[6]['created'] }}</p>
                  <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </a>
                </div>
              </div>
              <img src="/uploads/post/{{$mainBlogs[6]->image}}" class="w-full" alt="wall design" />
            </div>

          </div>
        </div>
      </div>
    </div>
  </div> --}}

 
























































>>>>>>> parent of 04a2c01 (Home-categories)


<section class="section wb">
    <div class="container">
        <div class="row">


            {{-- <div class="blog-box row">
                <div class="col-md-4">
                    <div class="post-media">
                        <a href="" title="">
                            <img src="/uploads/post/{{$item->image}}" alt="" class="img-fluid">
                            <div class="hovereffect"></div>
                        </a>
                    </div><!-- end media -->
                </div><!-- end col -->


                <div class="blog-meta big-meta col-md-8">
                    <span class="bg-aqua"><a href="" title="">{{$item['category_id']}}</a></span>
                    <h4><a href="/home/{{$item['id']}}" title="">{{$item['name']}}</a></h4>
                    <p>{!! Str::limit(strip_tags($item->description), 250) !!}</p>
                    <small><a href="" title=""><i class="fa fa-eye"></i> 4441</a></small>
                    <small><a href="" title="">{{ $item['created_at']->format('Y-m-d') }}</a></small>

                    <small><a href="#" title="">by Matilda</a></small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->  --}}


            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">

                        <div class="grid grid-cols-12 sm:px-5 gap-x-8 gap-y-16">
                            @foreach ($blog as $item)

                            <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                                <img
                                    src="/uploads/post/{{$item->image}}"/>
                                {{-- <p class="bg-green-500 flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3
                                    rounded-full uppercase inline-block">{{$item['category_id']}}</p> --}}
                                <a href="/home/{{$item['id']}}"  class="text-lg font-bold sm:text-xl md:text-2xl">{{$item['name']}}</a>
                                <p class="text-sm text-black">{!! Str::limit(strip_tags($item->description), 250) !!}</p>
                                <div class="pt-2 pr-0 pb-0 pl-0">
                                  <a class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-0 underline">Drawin</a>
                                  <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-1">· {{ $item['created_at']->format('Y-m-d') }} ·</p>
                                  {{-- <p class="inline text-xs font-medium text-gray-300 mt-0 mr-1 mb-0 ml-1">1hr 20min. read</p> --}}
                                </div>
                              </div>

                            @endforeach
                        </div><!-- end grid -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link hover:shadow-lg hover:border-opacity-0 duration-200 hover:-translate-y-0.5" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link hover:shadow-lg hover:border-opacity-0 duration-200 hover:-translate-y-0.5" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link hover:shadow-lg hover:border-opacity-0 duration-200 hover:-translate-y-0.5" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link hover:shadow-lg hover:border-opacity-0 duration-200 hover:-translate-y-0.5" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div>
                </div>
            </div><!-- end col -->

            @include('user.sidebar')

        </div><!-- end row -->
    </div><!-- end container -->
</section>



@include('user.footer')





<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->


<script src="user/js/jquery.min.js"></script>
<script src="user/js/tether.min.js"></script>
<script src="user/js/bootstrap.min.js"></script>
<script src="user/js/custom.js"></script>


</body>
</html>