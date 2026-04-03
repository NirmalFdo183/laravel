<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function showRegister(){
        return view('user.register');
    }

    public function createUser(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user'
        ]);

        return redirect()->route('login')->with('success','user registerd successfully');
    }

    public function loginAttempt(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials,true)){
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');
        }
        return back()->with('fail','authentication failed');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

