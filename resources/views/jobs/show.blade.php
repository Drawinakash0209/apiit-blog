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
<link rel="shortcut icon" href="/user/images/apiit-favicon.png" type="image/x-icon" />
<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="/user/css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="/user/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="/user/style.css" rel="stylesheet">

<link href="/user/nav-bar.css" rel="stylesheet">


<!-- Responsive styles for this template -->
<link href="/user/css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="/user/css/colors.css" rel="stylesheet">

<!-- Version Garden CSS for this template -->
<link href="/user/css/version/garden.css" rel="stylesheet">
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
    <div class="w-full pt-4 pr-5 pb-6 pl-5 mt-0 mr-auto mb-0 ml-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">
        <div class="flex flex-col items-center sm:px-5 md:flex-row">
            <div class="flex flex-col items-start justify-center w-full h-full pt-6 pr-0 pb-6 pl-0 mb-6 md:mb-0 md:w-1/2">
                <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:pr-10 lg:pr-16 md:space-y-5">
                    <div class="bg-green-500 flex items-center leading-none rounded-full text-gray-50 pt-1.5 pr-3 pb-1.5 pl-2 uppercase inline-block">
                        <p class="inline">
                            <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0
                            00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755
                            1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1
                            0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </p>
                    </div>
                    <a class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl">Student-Powered Opportunities: Build Your Career Together.</a>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="block">
                    <img src="https://media.istockphoto.com/id/1053082362/video/e-learning-and-education.jpg?s=640x640&k=20&c=iBWzrIz5obwjZPorQz9qs9UQPn_yqCtI1ZlIc1q1qrM=" alt="jobimage"/>
                </div>
            </div>
        </div>

    </div>
</div>


<section class="section wb">
    <div class="container">
        <div class="row">

            @foreach($jobs as $job)
                <div class="max-w-sm w-full lg:max-w-full lg:flex mb-4 mx-auto">
                    <div class="border-r border-b border-l border-gray-400 lg:border-l lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <p class="text-sm text-gray-600 flex items-center">
                                <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                </svg>
                                Students Only
                            </p>
                            <div class="text-gray-900 font-bold text-xl mb-2">{{$job->name}}</div>
                            <p class="text-gray-700 text-base">{{$job->description}}</p> <br>
                            <a href="{{$job->form_link}}" class="text-blue-500">Click here for more details</a>
                        </div>
                        <div class="flex items-center">
                            <div class="text-sm">
                                <p class="text-gray-900 leading-none">Job Type: <strong>{{$job->job_type}}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- end row -->
    </div><!-- end container -->
</section>





@include('user.footer')




<div class="dmtop">Scroll to Top</div>

<!-- Core JavaScript
================================================== -->
<script src="/user/js/jquery.min.js"></script>
<script src="/user/js/tether.min.js"></script>
<script src="/user/js/bootstrap.min.js"></script>
<script src="/user/js/custom.js"></script>

</body>
</html>
