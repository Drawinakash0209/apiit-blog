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
use Illuminate\Support\Facades\Session;

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
        Session::put('selected_user_type', $request->user_type);

        $userType = $request->user_type;

        $rules = [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', new Unique(User::class)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'string'],
        ];

        if ($userType === 'student') {
            $rules['name'] = ['required', 'string', 'max:255'];
            $rules['cb_number'] = ['required', 'string', new Unique(User::class, 'cb_number')];
            $rules['level'] = ['required', 'string'];
            $rules['batch'] = ['required', 'string'];
            $rules['student_degree'] = ['required', 'string'];
            $rules['student_school'] = ['required', 'string'];
        } else if ($userType === 'alumni') {
            $rules['name'] = ['required', 'string', 'max:255'];
            $rules['nic'] = ['required', 'string', new Unique(User::class, 'nic')];
            $rules['alumni_degree'] = ['required', 'string'];
            $rules['alumni_school'] = ['required', 'string'];
            $rules['graduated_year'] = ['required', 'string'];
        } else if ($userType === 'lecturer') {
            $rules['name'] = ['required', 'string', 'max:255'];
            $rules['lecturer_school'] = ['required', 'string'];
        } else if ($userType === 'club' || $userType === 'sport') {
            $rules['name'] = ['required', 'string', 'max:255'];
        } else if ($userType !== 'staff') {
            throw new \InvalidArgumentException("Invalid user type: $userType");
        }

        // $request->validate($rules);
        $validatedData = $request->validate($rules);

        $user = User::create([
            'name' => $userType === 'staff' ? $request->role : $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);
        // $user = User::create([
        // 'name' => $userType === 'staff' ? $validatedData['role'] : $validatedData['name'],
        // 'email' => $validatedData['email'],
        // 'password' => Hash::make($validatedData['password']),
        // 'user_type' => $userType,
        // ]);

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

        // Redirect the student to the approval student.status with message
        return redirect()->route('user.status')->with('success', 'Registration successful. Please wait for the admin approval');
}

    // public function store(Request $request): RedirectResponse
    // {
    //     $userType = $request->user_type;


    //     if ($userType === 'student') {
    //         $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'user_type' => ['required', 'string'],
    //         'cb_number' => ['required', 'string', 'unique:users,cb_number'],
    //         'level' => ['required', 'string'],
    //         'batch' => ['required', 'string'],
    //         'student_degree' => ['required', 'string'],
    //         'student_school' => ['required', 'string'],
    //         ]);


    //     } else if ($userType === 'alumni') {
    //         $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'user_type' => ['required', 'string'],
    //         'nic' => ['required', 'string', 'unique:users,nic'],
    //         'alumni_degree' => ['required', 'string'],
    //         'alumni_school' => ['required', 'string'],
    //         'graduated_year' => ['required', 'string'],
    //         ]);



    //     } else if ($userType === 'lecturer') {

    //         $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'user_type' => ['required', 'string'],
    //         'lecturer_school' => ['required', 'string'],
    //         ]);

    //     }else if ($userType === 'club') {

    //         $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'user_type' => ['required', 'string'],
    //         ]);

    //     }else if ($userType === 'sport') {

    //         $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'user_type' => ['required', 'string'],
    //         ]);

    //     }
    //     else if ($userType === 'staff') {

    //         $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'user_type' => ['required', 'string'],
    //         ]);

    //     }

    //     $user = User::create([
    //         // 'name' => $request->name,
    //         'name' => $userType === 'staff' ? $request->role : $request->name, // Ternary operator for name
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'user_type' => $request->user_type,
    //     ]);

    //     switch ($request->user_type) {
    //         case 'student':
    //             $user->cb_number = $request->cb_number;
    //             $user->level = $request->level;
    //             $user->batch = $request->batch;
    //             $user->degree = $request->student_degree;
    //             $user->school = $request->student_school;
    //             break;
    //         case 'alumni':
    //             $user->nic = $request->nic;
    //             $user->degree = $request->alumni_degree;
    //             $user->school = $request->alumni_school;
    //             $user->graduated_year = $request->graduated_year;
    //             break;
    //         case 'lecturer':
    //             $user->school = $request->lecturer_school;
    //             break;
    //     }

    //     $user->save();


    //     event(new Registered($user));

    //     // Auth::login($user);

    //     // return redirect(RouteServiceProvider::HOME);
    //     //Redirect the student to the approval student.status with message, Registration success full. Please wait for the admin approval
    //     return redirect()->route('user.status')->with('success', 'Registration success full. Please wait for the admin approval');
    // }
}
