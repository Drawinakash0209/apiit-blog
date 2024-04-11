
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
    {{-- <form method="POST"> --}}
        @csrf

        {{-- Drop down menu to select the user role --}}
        <div>
            <x-input-label for="user_type" :value="__('User Type')" />
            <select id="user_type" name="user_type" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2 " required>
                <option value="student">Student</option>
                <option value="alumni">Alumni</option>
                <option value="lecturer">Lecturer</option>
            </select>
            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
        </div>

        {{-- Student specific fields --}}

        {{-- div for the student field which is cb number  --}}
        <div class="form-group row student-fields hidden">
            <x-input-label for="cb_number" :value="__('CB Number')" />
            <x-text-input id="cb_number" class="block mt-1 w-full" type="text" name="cb_number" :value="old('cb_number')"  autofocus autocomplete="cb_number" />
            <x-input-error :messages="$errors->get('cb_number')" class="mt-2" />
        </div>

        {{-- div for the student field which is batch  --}}
        <div class="form-group row student-fields hidden">
            <x-input-label for="batch" :value="__('Batch')" />
            <x-text-input id="batch" class="block mt-1 w-full" type="text" name="batch" :value="old('batch')"  autofocus autocomplete="batch" />
            <x-input-error :messages="$errors->get('batch')" class="mt-2" />
        </div>

        {{-- div for the student fields which is school --}}
        <div class="form-group row student-fields hidden">
            <x-input-label for="student_school" :value="__('School')" />
            <x-text-input id="student_school" class="block mt-1 w-full" type="text" name="student_school" :value="old('student_school')" autofocus autocomplete="student_school" />
            <x-input-error :messages="$errors->get('student_school')" class="mt-2" />
        </div>

        {{--div for the students fields which is level  --}}
        <div class="form-group row student-fields hidden">
            <x-input-label for="level" :value="__('Level')" />
            <x-text-input id="level" class="block mt-1 w-full" type="text" name="level" :value="old('level')" autofocus autocomplete="level" />
            <x-input-error :messages="$errors->get('level')" class="mt-2" />
        </div>

        {{--div for the students fields which is degree  --}}
        <div class="form-group row student-fields hidden ">
            <x-input-label for="student_degree" :value="__('Degree Programme')" />
            <x-text-input id="student_degree" class="block mt-1 w-full" type="text" name="student_degree" :value="old('student_degree')" autofocus autocomplete="student_degree" />
            <x-input-error :messages="$errors->get('student_degree')" class="mt-2" />
        </div>
        {{-- Alumni fields --}}

        {{-- div for the alumni fields which is graduated year --}}
        <div class="form-group row alumni-fields hidden">
            <x-input-label for="graduated_year" :value="__('Graduated Year')" />
            <x-text-input id="graduated_year" class="block mt-1 w-full" type="text" name="graduated_year" :value="old('graduated_year')"  autocomplete="graduated_year" />
            <x-input-error :messages="$errors->get('graduated_year')" class="mt-2" />
        </div>

        {{-- div for the alumni fields which is NIC --}}
        <div class="form-group row alumni-fields hidden">
            <x-input-label for="nic" :value="__('NIC')" />
            <x-text-input id="nic" class="block mt-1 w-full" type="text" name="nic" :value="old('nic')"  autocomplete="nic" />
            <x-input-error :messages="$errors->get('nic')" class="mt-2" />
        </div>

        {{-- div for the alumni fields which is degree --}}
        <div class="form-group row alumni-fields hidden">
            <x-input-label for="alumni_degree" :value="__('Degree Programme')" />
            <x-text-input id="alumni_degree" class="block mt-1 w-full" type="text" name="alumni_degree" :value="old('alumni_degree')"  autocomplete="alumni_degree" />
            <x-input-error :messages="$errors->get('alumni_degree')" class="mt-2" />
        </div>

        {{-- div for the alumni fields which is school --}}
        <div class="form-group row alumni-fields hidden">
            <x-input-label for="alumni_school" :value="__('School')" />
            <x-text-input id="alumni_school" class="block mt-1 w-full" type="text" name="alumni_school" :value="old('alumni_school')"  autocomplete="alumni_school" />
            <x-input-error :messages="$errors->get('alumni_school')" class="mt-2" />
        </div>

        {{-- Lecturer fields --}}

        {{-- div for the lecturer fields which is school --}}
        <div class="form-group row lecturer-fields hidden">
            <x-input-label for="lecturer_school" :value="__('School')" />
            <x-text-input id="lecturer_school" class="block mt-1 w-full" type="text" name="lecturer_school" :value="old('lecturer_school')"  autocomplete="lecturer_school" />
            <x-input-error :messages="$errors->get('lecturer_school')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>



        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>



</x-guest-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userTypeSelect = document.getElementById('user_type');
        const formGroupContainer = document.querySelector('.form-group.row');

        function updateFormFields() {
            const selectedUserType = userTypeSelect.value;
            console.log('Selected User Type:', selectedUserType);

            // Hide all field groups by default
            const fieldGroups = document.querySelectorAll('.student-fields, .lecturer-fields, .alumni-fields');
            fieldGroups.forEach(group => group.classList.add('hidden'));

            // Show all fields related to the selected user type
            // const selectedGroupClass = `.${selectedUserType}-fields`;
            // const selectedGroups = document.querySelectorAll(selectedGroupClass);
            // selectedGroups.forEach(group => group.classList.remove('hidden'));

            // Show only the fields related to the selected user type
    switch (selectedUserType) {
      case 'student':

        document.querySelectorAll('.student-fields').forEach(group => group.classList.remove('hidden'));
        break;
      case 'lecturer':

        document.querySelectorAll('.lecturer-fields').forEach(group => group.classList.remove('hidden'));
        break;
      case 'alumni':


        document.querySelectorAll('.alumni-fields').forEach(group => group.classList.remove('hidden'));
        break;
      default:
        console.log('Invalid user type'); // Handle unexpected user type selection
    }
        }

        // Initial update on page load
        updateFormFields();

        // Update fields on user type selection change
        userTypeSelect.addEventListener('change', updateFormFields);
    });

    // Form submission handling
    // const userTypeSelect = document.getElementById('user_type');
    // const form = document.querySelector('form');

    // form.addEventListener('submit', function(event) {
    //     event.preventDefault(); // Prevent default form submission

    //     const userType = userTypeSelect.value;
    //     let controllerUrl;

    //     switch (userType) {
    //         case 'student':
    //             controllerUrl = '{{ route('student.register') }}'; // Replace with actual route name
    //             console.log('Registration route for', selectedUserType);
    //             break;
    //         case 'lecturer':
    //             // controllerUrl = '{{ route('student.register') }}'; // Replace with actual route name
    //             console.log('Selected User Type:', selectedUserType);
    //             break;
    //         case 'alumni':
    //             // controllerUrl = '{{ route('student.register') }}'; // Replace with actual route name
    //             console.log('Selected User Type:', selectedUserType);
    //             break;
    //     }

    //     if (controllerUrl) {
    //         form.action = controllerUrl;
    //         form.submit(); // Submit form to the determined controller
    //     } else {
    //         // Handle invalid user type selection
    //     }
    // });
    // Form submission handling
// const userTypeSelect = document.getElementById('user_type');
// const form = document.querySelector('form');

// form.addEventListener('submit', function(event) {
//     event.preventDefault(); // Prevent default form submission

//     const userType = userTypeSelect.value;
//     let controllerUrl;

//     switch (userType) {
//         case 'student':
//             controllerUrl = '{{ route('student.register') }}'; // Replace with actual route name
//             console.log('Registration route for', userType);
//             break;
//         case 'lecturer':
//             // controllerUrl = '{{ route('student.register') }}'; // Replace with actual route name
//             console.log('Registration route for', userType);
//             break;
//         case 'alumni':
//             // controllerUrl = '{{ route('student.register') }}'; // Replace with actual route name
//             console.log('Registration route for', userType);
//             break;
//         default:
//             console.log('Invalid user type');
//             break;
//     }

//     if (controllerUrl) {
//         form.setAttribute('action', controllerUrl);
//         form.submit(); // Submit form to the determined controller
//     } else {
//         // Handle invalid user type selection
//     }
// });


</script>
