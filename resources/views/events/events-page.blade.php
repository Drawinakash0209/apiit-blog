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




<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
    <div class="text-center">
        <h1 class="mb-2 text-center font-Bebas Neue text-5xl font-bold wrappermain"> Upcoming Event</h1>
    </div>

    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
        <div class="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-2 gap-5">
@foreach($events as $event)

<x-events-cards :event="$event"/>




        @endforeach


        </div>
    </div>

</section>



@auth

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
    <div class="text-center">
        <h1 class="mb-2 text-center font-Bebas Neue text-5xl font-bold wrappermain">Events Tailored specifically for you</h1>
    </div>

    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
        <div class="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-2 gap-5">
            @foreach($special_events as $specevent)

            <div class="relative w-full flex items-end justify-start text-left bg-cover bg-center" style="height: 450px; background-image:url({{$specevent->image ? asset('/uploads/event/' . $specevent->image): asset('/images/CR7.png')}});">
                <div class="absolute top-0  right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
                </div>
            
                <div class="absolute top-0 right-0 left-0 mx-3 mt-2 flex justify-between items-center">
                    <a href="#" class="text-xs bg-indigo-600 text-white px-5 py-2 uppercase hover:bg-white hover:text-indigo-600 transition ease-in-out duration-500">{{$specevent['type_of_event']}}</a>
                    <span class="ml-2"></span>
                    <div class="text-white font-regular flex flex-col justify-start">
                        <span class="text-3xl leading-0 font-semibold"><?php echo date('d', strtotime($specevent['start_date'])); ?></span>
                        <span class="-mt-3"><?php echo date('M', strtotime($specevent['start_date'])); ?></span>
                    </div>
                </div>
            
                <main class="p-5 z-10">
                    <a href="/events/{{$specevent['id']}}"
                       class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">{{$specevent['name']}}
                    </a>
                    <br>
                    <a href="#"
                       class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">{{$specevent['location']}}
                    </a>
                </main>
            
            </div>
            


            @endforeach
        </div>
    </div>

</section>
@endauth





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
