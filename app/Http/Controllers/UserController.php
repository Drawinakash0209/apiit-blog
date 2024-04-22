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
    public function index( Request $request)
    {

        $userType = $request->query('type'); // Get user type from query string

        // Logic for specific user types based on $userType
        $students = $userType === 'student' ? User::where('user_type', 'student')->get() : [];
        $alumni = $userType === 'alumni' ? User::where('user_type', 'alumni')->get() : [];
        $lecturers = $userType === 'lecturer' ? User::where('user_type', 'lecturer')->get() : [];
        $clubs = $userType === 'club' ? User::where('user_type', 'club')->get() : [];
        $sports = $userType === 'sport' ? User::where('user_type', 'sport')->get() : [];
        $staffs = $userType === 'staff' ? User::where('user_type', 'staff')->get() : [];



        return view('admin.user.index', compact('students', 'alumni', 'lecturers', 'clubs', 'sports', 'staffs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $userType = $request->get('type'); // Get the user type from the query string
        // $userType = $request->query('type');

        $user = new User();

        $uniqueFields = []; // Initialize an empty array

        // Assign unique fields based on user type
        switch ($userType) {
            case 'student':
                $uniqueFields = [
                    'cb_number' => 'CB Number', // Label for display
                    'batch' => 'Batch',
                    'school' => 'School',
                    'level' => 'Level',
                    'degree' => 'Degree',
                ];
                break;
            case 'alumni':
                $uniqueFields = [
                    'nic' => 'NIC',
                    'school' => 'School',
                    'degree' => 'Degree',
                    'graduated_year' => 'Graduated Year',
                ];
                break;
            case 'lecturer':
                $uniqueFields = [
                    'school' => 'School',
                ];
                break;
            default:
                // Handle unexpected user types (optional)
        }

        return view('admin.user.create', compact('user', 'userType', 'uniqueFields'));
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
            // 'password' => 'required|confirmed|Rules\Password::defaults()', // Assuming minimum password length of 8

        ];

        if ($userType === 'student') {
            $rules = array_merge($rules, [
            'cb_number' => 'required|unique:users,cb_number',
            'level' => 'required|string', // Add validation for level if needed
            'batch' => 'required|string', // Add validation for batch if needed
            'degree' => 'required|string', // Add validation for degree if needed
            'school' => 'required|string', // Add validation for school if needed
            ]);
        } else if ($userType === 'alumni') {
            $rules = array_merge($rules, [
            'nic' => 'required|string|unique:users,nic', // Add validation for NIC if needed
                'graduated_year' => 'required|digits:4|numeric',    // Add validation for year format if needed
            'degree' => 'required|string', // Add validation for degree if needed
            'school' => 'required|string', // Add validation for school if needed
            ]);
        } else if ($userType === 'lecturer') {
            // validation for lecturer school
            $rules = array_merge($rules, [
            'school' => 'required|string', // Add validation for school if needed
            ]);
        } else {
            // Handle invalid user type
            return redirect()->back()->withErrors(['user_type' => 'Invalid user type']);
        }

        $validated = $request->validate($rules);

        $validated['password'] = bcrypt('password'); // Assuming a default password for now

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
                $user->degree = $request->degree;
                $user->school = $request->school;
                break;
            case 'alumni':
                $user->nic = $request->nic;
                $user->degree = $request->degree;
                $user->school = $request->school;
                $user->graduated_year = $request->graduated_year;
                break;
            case 'lecturer':
                $user->school = $request->school;
                break;
        }

        $user->save($validated);



        // return redirect()->route('user.index')->with('message', 'User successfully created!');
        return redirect()->route('user.index', ['type' => $userType])->with('message', 'User successfully created!');

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
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $userType = $user->user_type; // Replace with your logic for determining user type

        $uniqueFields = []; // Initialize an empty array


        // Assign unique fields based on user type
        switch ($userType) {
            case 'student':
                $uniqueFields = [
                    'cb_number' => 'CB Number', // Label for display
                    'batch' => 'Batch',
                    // 'school' => 'School',
                    'school' => [ // Use an array for dropdown options
                    'label' => 'School',
                    'options' => ['Business', 'Law', 'Computing'], // Your school options
                    ],
                    // 'level' => 'Level',
                    'level' => [ // Use an array for dropdown options
                    'label' => 'Level',
                    'options' => ['Foundation','L4', 'L5', 'L6'], // Your level options
                    ],
                    'degree' => 'Degree',
                ];
                break;
            case 'alumni':
                // $uniqueFields = ['graduation_year']; // Example unique field for alumni
                $uniqueFields = [
                    'nic' => 'NIC', // Label for display
                    // 'school' => 'School',
                    'school' => [ // Use an array for dropdown options
                    'label' => 'School',
                    'options' => ['business', 'law', 'computing'], // Your school options
                    ],
                    'degree' => 'Degree',
                    'graduated_year' => 'Graduated Year',

                ];
                break;
            case 'lecturer':
                // $uniqueFields = ['department']; // Example unique field for lecturers
                $uniqueFields = [
                    'school' => 'School',

                ];
                // $uniqueFields = [];
                break;
            case 'staff':
                // Define fields for staff user type
                // $staffRoles = [
                //     'Manager',
                //     'Administrator',
                //     'Assistant',
                //     // Add more roles here if needed
                // ];
                $staffRoles = [
                    'Head of Academic Administration',
                    'Head of Student Support and Wellbeing Services',
                    'Manager ICT',
                    'Head of Library',
                    'Head of Industry Liaisons and Alumni Relations',
                    'Head of Study Global',
                    'Financial Support Services',
                    'Academic Administrative Services',
                    'Facilities and Maintenance',
                ];

                $uniqueFields = [
                    'role' => [
                        'label' => 'Role',
                        'options' => $staffRoles,
                    ],
                ];
                break;
            default:
            // Handle unexpected user types (optional)
        }

        return view('admin.user.edit', compact('user', 'userType', 'uniqueFields'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, User $user, $userType)
    public function update(Request $request, $id, $userType)
    {

        // $userType = $user->user_type; // Assuming user type is stored in the user model
         $user = User::findOrFail($id);

        $rules = [
            // 'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id},id", // Unique rule excludes current user
            // 'batch' => 'required',
            'is_approved' => 'required|boolean',
        ];

        if ($userType === 'student') {
            $rules = array_merge($rules, [
            'name' => 'required|string|max:255',
            'cb_number' => "required|unique:users,cb_number,{$user->id},id",
            'level' => 'required|string',
            'batch' => 'required|string',
            'degree' => 'required|string',
            'school' => 'required|string',
            ]);
        } else if ($userType === 'alumni') {
            $rules = array_merge($rules, [
            'name' => 'required|string|max:255',
            'nic' => 'required|string|unique:users,nic',
            'graduated_year' => 'required|string',
            'degree' => 'required|string',
            'school' => 'required|string',
            ]);
        } else if ($userType === 'lecturer') {
            $rules = array_merge($rules, [
            'name' => 'required|string|max:255',
            'school' => 'required|string',
            ]);

        }else if ($userType === 'staff') {
            $rules = array_merge($rules, [
            'role' => 'required|string|max:255',
            ]);

        }
        else {
            // Handle invalid user type
            return redirect()->back()->withErrors(['user_type' => 'Invalid user type']);

        }

        $validated = $request->validate($rules);


        // Conditional field assignment based on user type
        switch ($userType) {
            case 'student':
            $user->name = $validated['name'];
            $user->cb_number = $validated['cb_number']; // Assuming student_id exists in the user model
            $user->level = $validated['level'];
            $user->batch = $request->batch;
            // $user->degree = $request->student_degree;
            $user->degree = $request->degree;
            // $user->school = $request->student_school;
            $user->school = $request->school;
            break;
            case 'alumni':
            $user->name = $validated['name'];
            $user->nic = $request->nic;
            // $user->degree = $request->alumni_degree;
            // $user->school = $request->alumni_school;
            $user->degree = $request->degree;
            $user->school = $request->school;
            $user->graduated_year = $request->graduated_year;
            break;
            case 'lecturer':
            $user->name = $validated['name'];
            // $user->school = $request->lecturer_school;
            $user->school = $request->school;
            break;
            case 'staff':
            $user->name = $request->role;
            break;
        }

        $user->update($validated); // Update common fields and potentially updated unique fields


        // return redirect()->route('user.index')->with('message', 'user successfully updated!');
        return redirect()->route('user.index', ['type' => $userType])->with('message', 'user successfully updated!');


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
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // dd($user);

        //get th user type
        $userType = $user->user_type;
        // dd($userType);

        // return redirect()->route('user.index')->with('message', 'User successfully deleted!');
        return redirect()->route('user.index', ['type' => $userType])->with('message', 'user successfully deleted!');
    }
}
