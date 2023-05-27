<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDiet;
use App\Models\userMealPlan;
use App\Models\Foods;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class DietController extends Controller
{
    public function index()
    {
        $foods = \App\Models\Foods::all();
        return view('select-food', compact('foods'));
    }


    public function saveDiet(Request $request)
{
    // Validate the form data
    $request->validate([
        'foods' => 'required|array|min:10|max:20',
        'meal_types' => 'required|array|min:10|max:20',
        'days' => 'required|array|min:10|max:20',
    ]);

    $foods = $request->input('foods');
    $mealTypes = $request->input('meal_types');
    $days = $request->input('days');

    // Save the user's diet and meal plan to the database
    $diet = new UserDiet();
    $diet->fk_signUp_id = auth()->user()->id;
    $diet->week_start_date = now();
    $diet->week_end_date = now()->addDays(7);
    $diet->save();

    foreach ($foods as $index => $foodId) {
        $mealPlan = new UserMealPlan();
        $mealPlan->day_of_week = $days[$index];
        $mealPlan->mealType = $mealTypes[$index];
        $mealPlan->fk_signUp_id = auth()->user()->id;
        $mealPlan->fk_food_id = $foodId;
        $mealPlan->fk_diet_id = $diet->diet_id;
        $mealPlan->save();
    }

    // Redirect or show a success message
    return redirect()->back()->with('success', 'Your diet has been created successfully.');
}


}


