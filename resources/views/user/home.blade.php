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
</div>




{{-- <div class="text-gray-900 pt-12 pr-0 pb-14 pl-0 bg-white">
    <div class="w-full pt-4 pr-5 pb-6 pl-5 mt-0 mr-auto mb-0 ml-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16
        max-w-7xl"> --}}
{{-- <div class="flex flex-col items-center sm:px-5 md:flex-row">
    <div class="flex flex-col items-start justify-center w-full h-full pt-6 pr-0 pb-6 pl-0 mb-6 md:mb-0 md:w-1/2">
      <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:pr-4 lg:pr-6
          md:space-y-5">
    
        <a class="text-5xl font-bold leading-none lg:text-5xl xl:text-6xl">Unlocking Knowledge, Inspiring Excellence <br><span class="space-y-6">APIIT</span></a>
       
      </div>
    </div>
    <div class="w-full md:w-1/2">
      <div class="block">
        <img
            src="user/images/graduation.jpg" class="object-cover rounded-lg max-h-64 sm:max-h-96 btn- w-full h-full"/>
      </div>
    </div>
  </div> --}}

  












    {{-- </div>
</div> --}}

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
                                <p class="bg-green-500 flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3
                                    rounded-full uppercase inline-block">{{$item['category_id']}}</p>
                                <a href="/home/{{$item['id']}}"  class="text-lg font-bold sm:text-xl md:text-2xl">{{$item['name']}}</a>
                                <p class="text-sm text-black">{!! Str::limit(strip_tags($item->description), 250) !!}</p>
                                <div class="pt-2 pr-0 pb-0 pl-0">
                                  <a class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-0 underline">Jack Sparrow</a>
                                  <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-1">· {{ $item['created_at']->format('Y-m-d') }} ·</p>
                                  <p class="inline text-xs font-medium text-gray-300 mt-0 mr-1 mb-0 ml-1">1hr 20min. read</p>
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