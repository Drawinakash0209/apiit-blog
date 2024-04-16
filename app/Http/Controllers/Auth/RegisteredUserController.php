<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Unique;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $userType = $request->user_type;


        if ($userType === 'student') {
            $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'string'],
            'cb_number' => ['required', 'string', 'unique:users,cb_number'],
            'level' => ['required', 'string'],
            'batch' => ['required', 'string'],
            'student_degree' => ['required', 'string'],
            'student_school' => ['required', 'string'],
            ]);


        } else if ($userType === 'alumni') {
            $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'string'],
            'nic' => ['required', 'string', 'unique:users,nic'],
            'alumni_degree' => ['required', 'string'],
            'alumni_school' => ['required', 'string'],
            'graduated_year' => ['required', 'string'],
            ]);



        } else if ($userType === 'lecturer') {

            $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'string'],
            'lecturer_school' => ['required', 'string'],
            ]);

        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        switch ($request->user_type) {
            case 'student':
                $user->cb_number = $request->cb_number;
                $user->level = $request->level;
                $user->batch = $request->batch;
                $user->degree = $request->student_degree;
                $user->school = $request->student_school;
                break;
            case 'alumni':
                $user->nic = $request->nic;
                $user->degree = $request->alumni_degree;
                $user->school = $request->alumni_school;
                $user->graduated_year = $request->graduated_year;
                break;
            case 'lecturer':
                $user->school = $request->lecturer_school;
                break;
        }

        $user->save();


        event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        //Redirect the student to the approval student.status with message, Registration success full. Please wait for the admin approval
        return redirect()->route('user.status')->with('success', 'Registration success full. Please wait for the admin approval');
    }
}
