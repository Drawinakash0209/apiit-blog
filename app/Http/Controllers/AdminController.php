<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin.index', [
            'admins' => Admin::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.admin.create', [
            'admin' => (new Admin()),
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
            'email' => 'required|email|unique:users,email',
            // 'role' => 'required'
        ]);

        $validated['password'] = bcrypt('password');

        Admin::create($validated);

        return redirect()->route('admin.index')->with('message', 'Admin successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $admin = Admin::find($id); // Find the admin by ID
        // return view('admin.show', compact('admin')); // Pass data to view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', [
            'admin' => $admin,
            // 'roles' => Role::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'role' => 'required'
        ]);

        $admin->update($validated);

        return redirect()->route('admin.index')->with('message', 'Admin successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')->with('message', 'Admin successfully deleted!');
    }
}
