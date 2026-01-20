<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request){
        return Todo::create($request->all());
    }
    public function index(){
        return Todo::all();
    }
    public function update(Request $request,Todo $todo){
        $todo->update($request->all());
        return $todo;
    }
    public function destroy(Todo $todo){
        $todo->delete();
        return response()->json(null,204);
    }
}
