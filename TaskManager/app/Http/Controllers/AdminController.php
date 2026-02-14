<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use PDO;

class AdminController extends Controller
{
    public function dashboard(){
        $totalUsers = User::where('role','user')->count();
        $totalTasks = Task::all()->count();
        $tasks = Task::all();

        return view('admin.dashboard',compact('totalUsers','totalTasks','tasks'));
    }

    public function deleteTask($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success','Successfully deleted');
    }
}
