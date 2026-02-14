<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|email|unique:users',
            'pwd' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['pwd']),
            'role' => 'user',
        ]);

        return redirect()->route('login.form')->with('status','sucessfully registered');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(Auth::attempt($credentials,true)){
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->role == 'admin'){
                return redirect()->route('admin.dashboard')->with('msg','admin');
            }
            return redirect()->route('user.dashboard');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login.form');
    }
}
