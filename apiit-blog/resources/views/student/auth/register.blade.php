<x-guest-layout>
    {{-- Heading called Registration for admins alligned to center and keep some space from the bottom like margin bottom--}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center mb-6">
            {{ __('Student Registration') }}
        </h2>
    <form method="POST" action="{{ route('student.register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Student ID --}}
        {{-- <div class="mt-4">
            <x-input-label for="student_id" :value="__('Student ID')" />
            <x-text-input id="student_id" class="block mt-1 w-full" type="text" name="student_id" :value="old('student_id')" required autocomplete="student_id" />
            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
        </div> --}}

        {{-- Batch code --}}
        {{-- <div class="mt-4">
            <x-input-label for="batch" :value="__('Batch')" />
            <x-text-input id="batch" class="block mt-1 w-full" type="text" name="batch" :value="old('batch')" required autocomplete="batch" />
            <x-input-error :messages="$errors->get('batch')" class="mt-2" />
        </div> --}}

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Student Email')" />
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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('student.login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
