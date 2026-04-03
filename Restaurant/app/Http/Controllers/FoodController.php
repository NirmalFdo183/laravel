<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function createFoodItem(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|decimal:2',
        ]);

        Food::create([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'price' => $validated['price'],
        ]);

        return back()->with('success','item added successfully');
    }

    public function deleteFoodItem($id){
        $food_item = Food::findOrFail($id);

        $food_item->delete();

        return back()->with('delete','food item deleted successfully');
    }

    public function editFoodItemPage(Food $food){
        return view('admin.edit.food',compact('food'));
    }

    public function editFoodItem(Request $request,$id){
        $food_item = Food::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|decimal:2',
        ]);

        $food_item->update($validated);

        return redirect()->route('admin.dashboard')->with('update','successfully updated');
    }

}
