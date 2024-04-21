
<x-guest-layout>

    <!-- Logo -->
    <div class="flex justify-center mb-8">
        <a href="/"><img src="https://lmd.lk/wp-content/uploads/2020/11/IMAGE-APIIT-Staffordshire.jpg" class="w-40 h-auto" alt="Logo"></a>
    </div>

    <form method="POST" action="{{ route('register') }}">
    {{-- <form method="POST"> --}}
        @csrf

        {{-- Drop down menu to select the user role --}}
        <div>
            <x-input-label for="user_type" :value="__('User Type')" />
            {{-- <select id="user_type" name="user_type" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2 " required>
                <option value="student">Student</option>
                <option value="alumni">Alumni</option>
                <option value="lecturer">Lecturer</option>
                <option value="club">Club</option>
                <option value="sport">Sport</option>
                <option value="staff">Support Staff</option>

            </select> --}}
            <select id="user_type" name="user_type" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2" required>
                <option value="student" {{ old('user_type') == 'student' ? 'selected' : '' }}>Student</option>
                <option value="alumni" {{ old('user_type') == 'alumni' ? 'selected' : '' }}>Alumni</option>
                <option value="lecturer" {{ old('user_type') == 'lecturer' ? 'selected' : '' }}>Lecturer</option>
                <option value="club" {{ old('user_type') == 'club' ? 'selected' : '' }}>Club</option>
                <option value="sport" {{ old('user_type') == 'sport' ? 'selected' : '' }}>Sport</option>
                <option value="staff" {{ old('user_type') == 'staff' ? 'selected' : '' }}>Support Staff</option>
            </select>

            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
        </div>

        {{-- Student specific fields --}}

        {{-- div for the student field which is cb number  --}}
        <div class="form-group row student-fields hidden">
            <x-input-label for="cb_number" :value="__('CB Number')" />
            <x-text-input id="cb_number" class="block mt-1 w-full mb-2" type="text" name="cb_number" :value="old('cb_number')"  autofocus autocomplete="cb_number" />
            <x-input-error :messages="$errors->get('cb_number')" class="mt-2" />
        </div>

        {{-- div for the student field which is batch  --}}
        <div class="form-group row student-fields hidden">
            <x-input-label for="batch" :value="__('Batch Code')" />
            <x-text-input id="batch" class="block mt-1 w-full mb-2" type="text" name="batch" :value="old('batch')"  autofocus autocomplete="batch" />
            <x-input-error :messages="$errors->get('batch')" class="mt-2" />
        </div>

        {{-- div for the student fields which is school which is a dropdown with the Computing, Buisiness and Law options--}}
        <div class="form-group row student-fields hidden">
            <x-input-label for="student_school" :value="__('School')" />
            {{-- <select id="school" name="school" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2 ">
                <option value="Computing">Computing</option>
                <option value="Business">Business</option>
                <option value="Law">Law</option>
            </select> --}}
            <select id="student_school" name="student_school" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2">
                <option value="Computing" {{ old('student_school') == 'Computing' ? 'selected' : '' }}>Computing</option>
                <option value="Business" {{ old('student_school') == 'Business' ? 'selected' : '' }}>Business</option>
                <option value="Law" {{ old('student_school') == 'Law' ? 'selected' : '' }}>Law</option>
            </select>

            <x-input-error :messages="$errors->get('school')" class="mt-2" />
        </div>
        {{-- <div class="form-group row student-fields hidden">
            <x-input-label for="student_school" :value="__('School')" />
            <x-text-input id="student_school" class="block mt-1 w-full" type="text" name="student_school" :value="old('student_school')" autofocus autocomplete="student_school" />
            <x-input-error :messages="$errors->get('student_school')" class="mt-2" />
        </div> --}}

        {{--div for the students fields which is level which is a dropdown with the Foundation, L4 , L5, L6 options --}}
        <div class="form-group row student-fields hidden">
            <x-input-label for="level" :value="__('Level')" />
            {{-- <select id="level" name="level" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2 ">
                <option value="Foundation">Foundation</option>
                <option value="L4">L4</option>
                <option value="L5">L5</option>
                <option value="L6">L6</option>
            </select> --}}
            <select id="level" name="level" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2">
                <option value="Foundation" {{ old('level') == 'Foundation' ? 'selected' : '' }}>Foundation</option>
                <option value="L4" {{ old('level') == 'L4' ? 'selected' : '' }}>L4</option>
                <option value="L5" {{ old('level') == 'L5' ? 'selected' : '' }}>L5</option>
                <option value="L6" {{ old('level') == 'L6' ? 'selected' : '' }}>L6</option>
            </select>

            <x-input-error :messages="$errors->get('level')" class="mt-2" />
        </div>
        {{-- <div class="form-group row student-fields hidden">
            <x-input-label for="level" :value="__('Level')" />
            <x-text-input id="level" class="block mt-1 w-full" type="text" name="level" :value="old('level')" autofocus autocomplete="level" />
            <x-input-error :messages="$errors->get('level')" class="mt-2" />
        </div> --}}

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
            <x-text-input id="graduated_year" class="block mt-1 w-full mb-2" type="text" name="graduated_year" :value="old('graduated_year')"  autocomplete="graduated_year" />
            <x-input-error :messages="$errors->get('graduated_year')" class="mt-2" />
        </div>

        {{-- div for the alumni fields which is NIC --}}
        <div class="form-group row alumni-fields hidden">
            <x-input-label for="nic" :value="__('NIC')" />
            <x-text-input id="nic" class="block mt-1 w-full mb-2" type="text" name="nic" :value="old('nic')"  autocomplete="nic" />
            <x-input-error :messages="$errors->get('nic')" class="mt-2" />
        </div>

        {{-- div for the alumni fields which is degree --}}
        <div class="form-group row alumni-fields hidden">
            <x-input-label for="alumni_degree" :value="__('Degree Programme')" />
            <x-text-input id="alumni_degree" class="block mt-1 w-full mb-2" type="text" name="alumni_degree" :value="old('alumni_degree')"  autocomplete="alumni_degree" />
            <x-input-error :messages="$errors->get('alumni_degree')" class="mt-2" />
        </div>

        {{-- div for the alumni fields which is school which is a dropdown with the Computing, Buisiness and Law options--}}
        <div class="form-group row alumni-fields hidden">
            <x-input-label for="alumni_school" :value="__('School')" />
            {{-- <select id="school" name="school" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2 ">
                <option value="Computing">Computing</option>
                <option value="Business">Business</option>
                <option value="Law">Law</option>
            </select> --}}
            <select id="alumni_school" name="alumni_school" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2">
                <option value="Computing" {{ old('alumni_school') == 'Computing' ? 'selected' : '' }}>Computing</option>
                <option value="Business" {{ old('alumni_school') == 'Business' ? 'selected' : '' }}>Business</option>
                <option value="Law" {{ old('alumni_school') == 'Law' ? 'selected' : '' }}>Law</option>
            </select>

            <x-input-error :messages="$errors->get('school')" class="mt-2" />
        </div>
        {{-- <div class="form-group row alumni-fields hidden">
            <x-input-label for="alumni_school" :value="__('School')" />
            <x-text-input id="alumni_school" class="block mt-1 w-full" type="text" name="alumni_school" :value="old('alumni_school')"  autocomplete="alumni_school" />
            <x-input-error :messages="$errors->get('alumni_school')" class="mt-2" />
        </div> --}}

        {{-- Lecturer fields --}}

        {{-- div for the lecturer fields which is school --}}
        <div class="form-group row lecturer-fields hidden">
            <x-input-label for="lecturer_school" :value="__('School')" />
            <x-text-input id="lecturer_school" class="block mt-1 w-full" type="text" name="lecturer_school" :value="old('lecturer_school')"  autocomplete="lecturer_school" />
            <x-input-error :messages="$errors->get('lecturer_school')" class="mt-2" />
        </div>

        <!-- Role (hidden by default) -->
        <div class="mt-4 staff-fields hidden">
            <x-input-label for="role" :value="__('Role')" />
            {{-- <select id="role" name="role" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2 ">
                <option value="Head of Academic Administration">Head of Academic Administration</option>
                <option value="Head of Student Support and Wellbeing Services">Head of Student Support and Wellbeing Services</option>
                <option value="Manager ICT">Manager ICT</option>
                <option value="Head of Library">Head of Library</option>
                <option value="Head of Industry Liaisons and Alumni Relations">Head of Industry Liaisons and Alumni Relations</option>
                <option value="Head of Study Global">Head of Study Global</option>
                <option value="Financial Support Services">Financial Support Services</option>
                <option value="Academic Administrative Services">Academic Administrative Services</option>
                <option value="Facilities and Maintenance">Facilities and Maintenance</option>

            </select> --}}
            <select id="role" name="role" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 mb-2">
                <option value="Head of Academic Administration" {{ old('role') == 'Head of Academic Administration' ? 'selected' : '' }}>Head of Academic Administration</option>
                <option value="Head of Student Support and Wellbeing Services" {{ old('role') == 'Head of Student Support and Wellbeing Services' ? 'selected' : '' }}>Head of Student Support and Wellbeing Services</option>
                <option value="Manager ICT" {{ old('role') == 'Manager ICT' ? 'selected' : '' }}>Manager ICT</option>
                <option value="Head of Library" {{ old('role') == 'Head of Library' ? 'selected' : '' }}>Head of Library</option>
                <option value="Head of Industry Liaisons and Alumni Relations" {{ old('role') == 'Head of Industry Liaisons and Alumni Relations' ? 'selected' : '' }}>Head of Industry Liaisons and Alumni Relations</option>
                <option value="Head of Study Global" {{ old('role') == 'Head of Study Global' ? 'selected' : '' }}>Head of Study Global</option>
                <option value="Financial Support Services" {{ old('role') == 'Financial Support Services' ? 'selected' : '' }}>Financial Support Services</option>
                <option value="Academic Administrative Services" {{ old('role') == 'Academic Administrative Services' ? 'selected' : '' }}>Academic Administrative Services</option>
                <option value="Facilities and Maintenance" {{ old('role') == 'Facilities and Maintenance' ? 'selected' : '' }}>Facilities and Maintenance</option>
            </select>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4 name">
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
        const nameInputContainer = document.querySelector('.name');


        function updateFormFields() {
            const selectedUserType = userTypeSelect.value;
            console.log('Selected User Type:', selectedUserType);

            // Hide all field groups by default
            const fieldGroups = document.querySelectorAll('.student-fields, .lecturer-fields, .alumni-fields, .staff-fields');
            fieldGroups.forEach(group => group.classList.add('hidden'));



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

            case 'staff':
                document.querySelectorAll('.staff-fields').forEach(group => group.classList.remove('hidden'));
                // Hide the Name input field for Support Staff
                nameInputContainer.classList.add('hidden');
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

</script>
