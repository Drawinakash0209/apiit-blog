<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.student.index', [
            'students' => Student::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create', [
            'student' => (new Student()),
            // 'roles' => Role::cases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'student_id' => 'required|unique:students,student_id',
            'batch' => 'required',
            // 'role' => 'required'
        ]);

        $validated['password'] = bcrypt('password');

        Student::create($validated);

        return redirect()->route('student.index')->with('message', 'Student successfully created!');
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
    public function edit(Student $student)
    {
        return view('admin.student.edit', [
            'student' => $student,
            // 'roles' => Role::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:students,email,' . $student->id . ',id', // Updated validation rule
        'student_id' => 'required|unique:students,student_id,' . $student->id . ',id', // Updated validation rule
        'batch' => 'required',
        'is_approved' => 'required',
        // 'role' => 'required'
        ]);

        $student->update($validated);

        return redirect()->route('student.index')->with('message', 'Student successfully updated!');
    }

    /**
     * Show pending students
     */
    public function showpending(){
        $pendingStudents = Student::where('is_approved', false)->get();

        return view('admin.student.pending', [
            'pendingstudents' => $pendingStudents
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')->with('message', 'Student successfully deleted!');
    }
}
