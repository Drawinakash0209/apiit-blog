<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
//rules password
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create', [
            'user' => (new User()),
            // 'roles' => Role::cases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userType = $request->user_type;

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|Rules\Password::defaults()', // Assuming minimum password length of 8

        ];

        if ($userType === 'student') {
            $rules = array_merge($rules, [
            'student_id' => 'required|unique:users,student_id',
            'level' => 'required|string', // Add validation for level if needed
            'batch' => 'required|string', // Add validation for batch if needed
            'student_degree' => 'required|string', // Add validation for degree if needed
            'student_school' => 'required|string', // Add validation for school if needed
            ]);
        } else if ($userType === 'alumni') {
            $rules = array_merge($rules, [
            'nic' => 'required|string|unique:users,nic', // Add validation for NIC if needed
            'graduated_year' => 'required|string', // Add validation for year format if needed
            'alumni_degree' => 'required|string', // Add validation for degree if needed
            'alumni_school' => 'required|string', // Add validation for school if needed
            ]);
        } else if ($userType === 'lecturer') {
            // validation for lecturer school
            $rules = array_merge($rules, [
            'lecturer_school' => 'required|string', // Add validation for school if needed
            ]);
        } else {
            // Handle invalid user type
            return redirect()->back()->withErrors(['user_type' => 'Invalid user type']);
        }

        $validated = $request->validate($rules);

        // $validated['password'] = bcrypt('password'); // Assuming a default password for now

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

        $user->save($validated);



        return redirect()->route('user.index')->with('message', 'User successfully created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
            // 'roles' => Role::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $userType = $user->user_type; // Assuming user type is stored in the user model

        $rules = [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id},id", // Unique rule excludes current user
            // 'batch' => 'required',
            // 'is_approved' => 'required|boolean',
        ];

        if ($userType === 'student') {
            $rules = array_merge($rules, [
            'cb_number' => "required|unique:users,cb_number,{$user->id},id", // Unique rule excludes current user
            'level' => 'required|string', // Add validation for level if needed
            'batch' => 'required|string', // Add validation for batch if needed
            'student_degree' => 'required|string', // Add validation for degree if needed
            'student_school' => 'required|string', // Add validation for school if needed
            ]);
        } else if ($userType === 'alumni') {
            $rules = array_merge($rules, [
            'nic' => 'required|string|unique:users,nic', // Add validation for NIC if needed
            'graduated_year' => 'required|string', // Add validation for year format if needed
            'alumni_degree' => 'required|string', // Add validation for degree if needed
            'alumni_school' => 'required|string', // Add validation for school if needed
            ]);
        } else if ($userType === 'lecturer') {
            $rules = array_merge($rules, [
            'lecturer_school' => 'required|string', // Add validation for school if needed
            ]);
        } else {
            // Handle invalid user type
            return redirect()->back()->withErrors(['user_type' => 'Invalid user type']);
        }

        $validated = $request->validate($rules);

        // Conditional field assignment based on user type
        switch ($userType) {
            case 'student':
            $user->cb_number = $validated['cb_number']; // Assuming student_id exists in the user model
            $user->level = $validated['level'];
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

        $user->update($validated); // Update common fields and potentially updated unique fields


        return redirect()->route('user.index')->with('message', 'user successfully updated!');

    }
    /**
     * Show pending students
     */
    public function showpending(){
        $pendingUsers = User::where('is_approved', false)->get();

        return view('admin.user.pending', [
            'pendingusers' => $pendingUsers
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('message', 'User successfully deleted!');
    }
}
