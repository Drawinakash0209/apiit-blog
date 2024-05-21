

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




<div class="max-w-screen-xl mx-auto p-5 sm:p-8 md:p-12 relative">
    <div class="bg-cover h-64 text-center overflow-hidden"
        style="height: 450px; background-image: url('/uploads/event/{{$event->image}}')">
    </div>
    <div class="max-w-2xl mx-auto">
        <div
            class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">

            <div class="">

                <a href="#"
                    class="text-xs text-indigo-600 uppercase font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                  {{$event['type_of_event']}}
                </a>

                <h1 href="#" class="text-gray-900 font-bold text-3xl mb-2">{{$event['name']}}</h1>


                <p class="text-base leading-8 my-5">
                    {!! $event->description !!}
                </p>




            </div>

        </div>

        <div class="flex">
            <div class="m-auto">
              <button class="p-2 pl-5 pr-5 mt-2 bg-transparent border-2 border-blue-500 text-blue-500 text-lg rounded-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300"><i class="fa-regular fa-calendar-days"></i> <?php echo date('M', strtotime($event['start_date'])); ?> <?php echo date('d', strtotime($event['start_date'])); ?></button>
              <button class="p-2 pl-5 pr-5 mt-2 bg-transparent border-2 border-gray-500 text-gray-500 text-lg rounded-lg hover:bg-gray-500 hover:text-gray-100 focus:border-4 focus:border-gray-300"><i class="fa-solid fa-clock"></i> {{$event['start_time']}}</button>
              <button class="p-2 pl-5 pr-5 mt-2 bg-transparent border-2 border-yellow-500 text-yellow-500 text-lg rounded-lg hover:bg-yellow-500 hover:text-gray-100 focus:border-4 focus:border-yellow-300"><i class="fa-solid fa-location-dot"></i> {{$event['location']}}</button>
            </div>
          </div>
    </div>
</div>




@include('user.footer')





<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="/user/js/jquery.min.js"></script>
<script src="/user/js/tether.min.js"></script>
<script src="/user/js/bootstrap.min.js"></script>
<script src="/user/js/custom.js"></script>

</body>
</html>
