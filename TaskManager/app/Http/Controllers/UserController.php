<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(Request $request){
        $validate = $request->validate([
            'title' =>'required|string|max:256',
            'description'=>'required|string',
            'status'=>'required|In:Pending,"In Progress",Completed',
            'due_date'=>'required|date',
        ]);

        Task::create([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'status' => $validate['status'],
            'due_date' => $validate['due_date'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success','Task is sucessfully created');
    }

    public function dashboard(){
        $user_id = Auth::id();
        $tasks = Task::where('user_id',$user_id)->get();

        return view('user.dashboard');
    }
}
