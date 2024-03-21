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
<link rel="shortcut icon" href="user/images/favicon.ico" type="image/x-icon" />
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





<div class="text-gray-900 pt-12 pr-0 pb-14 pl-0 bg-white">
    <div class="w-full pt-4 pr-5 pb-6 pl-5 mt-0 mr-auto mb-0 ml-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16
        max-w-7xl">
<div class="flex flex-col items-center sm:px-5 md:flex-row">
    <div class="flex flex-col items-start justify-center w-full h-full pt-6 pr-0 pb-6 pl-0 mb-6 md:mb-0 md:w-1/2">
      <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:pr-10 lg:pr-16
          md:space-y-5">
        <div class="bg-green-500 flex items-center leading-none rounded-full text-gray-50 pt-1.5 pr-3 pb-1.5 pl-2
            uppercase inline-block">
          <p class="inline">
            <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0
                00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755
                1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1
                0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          </p>
          <p class="inline text-xs font-medium">New</p>
        </div>
        <a class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl">Write anything. Be creative.</a>
        <div class="pt-2 pr-0 pb-0 pl-0">
          <p class="text-sm font-medium inline">author:</p>
          <a class="inline text-sm font-medium mt-0 mr-1 mb-0 ml-1 underline">Jack Sparrow</a>
          <p class="inline text-sm font-medium mt-0 mr-1 mb-0 ml-1">· 23rd, April 2021 ·</p>
          <p class="text-gray-200 text-sm font-medium inline mt-0 mr-1 mb-0 ml-1">1hr 20min. read</p>
        </div>
      </div>
    </div>
    <div class="w-full md:w-1/2">
      <div class="block">
        <img
            src="https://images.unsplash.com/photo-1626314928277-1d373ddb6428?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mzd8fHxlbnwwfHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60" class="object-cover rounded-lg max-h-64 sm:max-h-96 btn- w-full h-full"/>
      </div>
    </div>
  </div>

    </div>
</div>

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