<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(){
        $foods = Food::all();
        $user = Auth::user();

        return view('user.dashboard',compact('foods','user'));
    }

    
}
