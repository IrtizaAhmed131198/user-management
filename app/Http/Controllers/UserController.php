<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imagePath = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads/avatar'), $imagePath);
            $imagePath = 'assets/uploads/avatar/' . $imagePath;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'image' => $imagePath
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6', // Password is optional during update
            'avatar' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = User::findOrFail($id);

        // Handle avatar upload
        $imagePath = $user->image; // Keep the existing avatar path if no new image is uploaded
        if ($request->hasFile('avatar')) {
            // Delete the old avatar if it exists
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }

            $image = $request->file('avatar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads/avatar'), $filename);
            $imagePath = 'assets/uploads/avatar/' . $filename;
        }

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'image' => $imagePath,
        ]);

        return redirect()->route('user.edit', ['id' => $user->id])->with('success', "User '{$user->name}' updated successfully.");
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if ($user->image && file_exists(public_path($user->image))) {
            unlink(public_path($user->image));
        }
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
