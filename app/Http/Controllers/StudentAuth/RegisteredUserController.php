<?php

namespace App\Http\Controllers\StudentAuth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('student.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Student::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //Student Id which is a string and max is 8 and unique
            'student_id' => ['required', 'string', 'max:8', 'unique:'.Student::class],
            //Batch which is a string and max is 12
            'batch' => ['required', 'string', 'max:12'],


        ]);

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'student_id' => $request->student_id,
            'batch' => $request->batch,
             //is approved is a boolean with default value of false
            'is_approved' => false,

        ]);

        event(new Registered($student));

        Auth::login($student);

        //Redirect the student to the approval student.status with message, Registration success full. Please wait for the admin approval
        return redirect()->route('student.status')->with('success', 'Registration success full. Please wait for the admin approval');



        // return redirect(RouteServiceProvider::STUDENT_HOME);
    }
}
