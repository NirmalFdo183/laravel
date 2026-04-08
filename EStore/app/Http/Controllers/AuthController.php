<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm(){
        return view('login');
    }

    public function registerForm(){
        return view('register');
    }
    
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|in:m,f',
            'address' => 'required|string',
            'mobile' => 'required|digits:10',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'gender' => $validated['gender'],
            'address' => $validated['address'],
            'mobile' => $validated['mobile'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer'
        ]);

        return redirect()->route('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            else if(Auth::user()->role == 'employee'){
                return redirect()->route('employee.dashboard');
            }
            else if(Auth::user()->role == 'customer'){
                return redirect()->route('customer.dashboard');
            }
        }
        return back()->with('fail','invalid email or password');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.form');
    }

    public function adminDashboard(){
        $admin = Auth::user();
        return view('admin.dashboard',compact('admin'));
    }
    public function customerDashboard(){
        $customer = Auth::user();
        return view('customer.dashboard',compact('customer'));
    }
    public function employeeDashboard(){
        $employee = Auth::user();
        return view('employee.dashboard',compact('employee'));
    }
}
