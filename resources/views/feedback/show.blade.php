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



<div class="flex flex-row mt-10">
    <div class="w-1/3 bg-gray-100 px-6 py-4 ml-40 rounded-lg shadow-md">
      <h1 class="text-xl font-bold mb-2">Voice of the Campus: Anonymous Feedbacks !</h1>
      <p class="text-gray-700">
         Your opinions matter, and this is your space to share compliments, complaints, and suggestions about your university experience. Whether it's a shout-out to outstanding faculty members, constructive feedback on campus facilities, or innovative ideas for enhancing student life, we want to hear from you. Your anonymity ensures that you can express yourself freely, fostering open dialogue and driving positive change within our university community. Together, let's shape the future of our campus environment. Share your thoughts today and be a part of the conversation!
      </p>
    </div>
    <div class="w-1/2 px-6 py-4">
      <form method="POST" action="{{ route('feedback.store') }}" class="max-w-sm mx-auto shadow-md px-6 py-4 rounded-lg bg-gray-100">
        {{-- Drop down menu to select the feedback type --}}
        <div>
          <x-input-label for="type" :value="__('Type Of the Feedback')" />

          <select id="type" name="type" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2" required>
            <option value="Compliment" {{ old('type') == 'Compliment' ? 'selected' : '' }}>Compliment</option>
            <option value="Suggesion" {{ old('type') == 'Suggesion' ? 'selected' : '' }}>Suggesion</option>
            <option value="Complaint" {{ old('type') == 'Complaint' ? 'selected' : '' }}>Complaint</option>
          </select>

          <x-input-error :messages="$errors->get('type')" class="mt-2" />
        </div>

        {{-- Text area to input the content of the feedback --}}
        <div>
          <x-input-label for="content" :value="__('Content')" />

          <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 mt-2" required>{{ old('content') }}</textarea>

          <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
          {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            {{ __('Already registered?') }}
          </a> --}}

          <x-primary-button class="ms-4">
            {{ __('Submit') }}
          </x-primary-button>
        </div>
      </form>
    </div>
  </div>



{{-- @include('user.footer') --}}





{{-- <div class="dmtop">Scroll to Top</div> --}}

<!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="user/js/jquery.min.js"></script>
<script src="user/js/tether.min.js"></script>
<script src="user/js/bootstrap.min.js"></script>
<script src="user/js/custom.js"></script>

</body>
</html>
