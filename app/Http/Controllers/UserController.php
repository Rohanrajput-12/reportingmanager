<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
    $data['dataList'] = User::where('created_by', auth()->id())->get();
    return view('user.index')->with($data);
    }

    public function create()
    {
        $data['roleList'] = Role::pluckActiveRecords();
        return view('user.create')->with($data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Create the user
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['email']), // using email as password for simplicity
            'role_id' => $input['role_id'],
            'created_by' => auth()->id(),

        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {

        $user = User::where('id', $id)->where('created_by', auth()->id())->firstOrFail();
        $roleList = Role::pluck('name', 'id');
        return view('user.edit', compact('user', 'roleList'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();

        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_id' => 'required|exists:roles,id',
        ]);

        // Find the user to update
        $user = User::findOrFail($id);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->role_id = $input['role_id'];

        // Update the user
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        // Find the user to delete
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}
