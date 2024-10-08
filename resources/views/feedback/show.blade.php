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




<div class="flex flex-row mt-10 mb-12">
  <div class="w-1/3 bg-gray-100 px-6 py-4 ml-40 rounded-lg shadow-md">
    <h1 id="feedback-title" class="text-xl font-bold mb-2">Voice of the Campus</h1>
    <p id="feedback-description" class="text-gray-700">
      Your opinions matter, and this is your space to share compliments, complaints, and suggestions about your university experience. Whether it's a shout-out to outstanding faculty members, constructive feedback on campus facilities, or innovative ideas for enhancing student life, we want to hear from you. Your anonymity ensures that you can express yourself freely, fostering open dialogue and driving positive change within our university community. Together, let's shape the future of our campus environment. Share your thoughts today and be a part of the conversation!
    </p>
    <h3 id="feedback-title2" class="font-bold mb-2 mt-3">Why Identity Revealed Feedback?</h3>
    <p id="feedback-description2" class="text-gray-700">
      Revealing your identity when giving feedback helps ensure that you can be updated with the actions taken in response to your feedback, enhancing communication and accountability.
    </p>
  </div>
  <div class="w-1/2 px-6 py-4">
    <form method="POST" action="{{ route('feedback.store') }}" class="max-w-sm mx-auto shadow-md px-6 py-4 rounded-lg bg-gray-100">
      @csrf
      {{-- Toggle Switch to change the title and description --}}
      <div class="flex items-center justify-between mb-4">
        <span class="text-gray-700">Share Feedback Anonymously</span>
        <label class="relative cursor-pointer flex items-center">
          <input type="checkbox" id="toggle-switch" value="" class="peer sr-only" />
          <div class="peer h-5 w-9 rounded-full bg-gray-400 after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-indigo-900 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-200"></div>
        </label>
      </div>

      {{-- Hidden input field to store the type (boolean: 1 for anonymous, 0 for identified) --}}
      <input type="hidden" id="feedback-type" name="anonymous" value="0">

      {{-- Hidden input field to get the logged-in user's id --}}
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

      {{-- Email input field shows the logged-in user's email and cannot be edited --}}
      <div id="email-field">
        <x-input-label for="email" :value="__('Email')" />
        <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-3" required readonly>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      {{-- Drop down menu to select the feedback type --}}
      <div>
        <x-input-label for="type" :value="__('Type Of the Feedback')" />
        <select id="type" name="type" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2" required>
          <option value="Compliment" {{ old('type') == 'Compliment' ? 'selected' : '' }}>Compliment</option>
          <option value="Suggestion" {{ old('type') == 'Suggestion' ? 'selected' : '' }}>Suggestion</option>
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
        <x-primary-button class="ms-4">
          {{ __('Submit') }}
        </x-primary-button>
      </div>
    </form>
  </div>
</div>

<script>
  document.getElementById('toggle-switch').addEventListener('change', function () {
    var title = document.getElementById('feedback-title');
    var description = document.getElementById('feedback-description');
    var title2 = document.getElementById('feedback-title2');
    var description2 = document.getElementById('feedback-description2');
    var emailField = document.getElementById('email-field');
    var feedbackType = document.getElementById('feedback-type');

    if (this.checked) {
      title.textContent = 'Share Your Feedback Anonymously';
      description.textContent = 'Your opinions matter, and this is your space to share compliments, complaints, and suggestions about your university experience. Whether it\'s a shout-out to outstanding faculty members, constructive feedback on campus facilities, or innovative ideas for enhancing student life, we want to hear from you. Your anonymity ensures that you can express yourself freely, fostering open dialogue and driving positive change within our university community.';
      title2.textContent = 'Limitations of Anonymous Feedback';
      description2.textContent = 'With anonymous feedback, you cannot be updated with the actions taken in response to your feedback, as there is no way to contact you.';
      emailField.style.display = 'none'; // Hide email field
      feedbackType.value = '1'; // Set feedback type to anonymous
    } else {
      title.textContent = 'Voice of the Campus';
      description.textContent = 'Your opinions matter, and this is your space to share compliments, complaints, and suggestions about your university experience. Whether it\'s a shout-out to outstanding faculty members, constructive feedback on campus facilities, or innovative ideas for enhancing student life, we want to hear from you. Together, let\'s shape the future of our campus environment. Share your thoughts today and be a part of the conversation!';
      title2.textContent = 'Why Identity Revealed Feedback?';
      description2.textContent = 'Revealing your identity when giving feedback helps ensure that you can be updated with the actions taken in response to your feedback, enhancing communication and accountability.';
      emailField.style.display = 'block'; // Show email field
      feedbackType.value = '0'; // Set feedback type to identified
    }
  });
</script>








@include('user.footer')





<div class="dmtop">Scroll to Top</div>

<!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="/user/js/jquery.min.js"></script>
<script src="/user/js/tether.min.js"></script>
<script src="/user/js/bootstrap.min.js"></script>
<script src="/user/js/custom.js"></script>

</body>
</html>
