<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {
        $users = User::with(['orders.orderItems.product'])->paginate(5);
        return view('crud_user.list', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('crud_user.show', compact('user'));
    }

    public function showByRole($role)
    {
        $users = User::where('role', $role)->paginate(5);
        $roleName = ucfirst($role);
        return view('crud_user.role_users', compact('users', 'roleName', 'role'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('crud_user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|in:admin,user,editor,manager',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('user.list')->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.list')->with('success', 'User deleted successfully');
    }
} 