<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('delete', 'user is successfully deleted');
    }

    public function editUser(Request $request)
    {
        $user_id = Auth::id();

        $user = User::findOrFail($user_id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return back()->with('edit', 'successfully edited');
    }
}
