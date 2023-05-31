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
        'meal_types.*' => 'required|in:breakfast,lunch,dinner,snacks',
        'days' => 'required|array|min:10|max:20',
        'days.*' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
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

    $totalCalories = 0;

    foreach ($foods as $index => $foodId) {
        

       $food=Foods::find($foodId);
       $totalCalories += $food->calories;
       //$personalizedCalories = calculatePersonalizedCalories(auth()->user(),$totalCalories);
       
        $mealPlan = new UserMealPlan();
        $mealPlan->day_of_week = $days[$index];
        $mealPlan->mealType = $mealTypes[$index];
        $mealPlan->fk_signUp_id = auth()->user()->id;
        $mealPlan->fk_food_id = $foodId;
        $mealPlan->fk_diet_id = $diet->diet_id;
        $mealPlan->personalized_calories = $this->calculatePersonalizedCalories(auth()->user(), $totalCalories);
        $mealPlan->save();
    }

    // Redirect or show a success message
    return redirect()->back()->with('success', 'Your diet has been created successfully.');
}


function calculatePersonalizedCalories($user,$TCalories)
{
    $weight = $user->weight;
    $height = $user->height;
    $age = $user->age;
    $gender = $user->gender;
    $activity = $user->activity;
    $goal = $user->goal;

    // Calculate Basal Metabolic Rate (BMR) based on gender
    if ($gender == 'male') {
        $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
    } else {
        $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
    }

    // Apply activity factor to BMR
    $activityFactors = [
        'low_activity' => 1.2,
        'high_activity' => 1.725,
    ];

    $activityFactor = $activityFactors[$activity];
    $TCalories = $bmr * $activityFactor;

    // Adjust calories based on goal
    if ($goal == 'lose_weight') {
        $TCalories -= 500; // Subtract 500 calories for weight loss
    }elseif ($goal == 'gain_weight'){
        $TCalories += 500; // Add 500 calories for weight gain
    }

    return $TCalories;
}
}