<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\userDiet;
use App\Models\userMealPlan;
use App\Models\Foods;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class DietController extends Controller
{
    public function index()
    {

        $existingDiet = UserDiet::where('fk_signUp_id', auth()->user()->id)->first();
        if ($existingDiet) {
            return redirect()->route('showDiet')->with('info', 'You have already created a diet. You can simply Update it!');
        }

        $foods = \App\Models\Foods::all();
        return view('select-food', compact('foods'));
    }








    public function saveDiet(Request $request)
{

    $existingDiet = UserDiet::where('fk_signUp_id', auth()->user()->id)->first();
        if ($existingDiet) {
            return redirect()->route('showDiet')->with('info', 'You have already created a diet. You can simply Update it!.');
        }

    // Validate the form data
    $request->validate([
        'foods' => 'required|array|min:20|max:30',
        'meal_types' => 'required|array|min:20|max:30',
        'meal_types.*' => 'required|in:breakfast,lunch,dinner,snacks',
        'days' => 'required|array|min:20|max:30',
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
        $mealPlan->personalized_grams = $this->calculatePersonalizedGrams(auth()->user(), $totalCalories, $food->calories);//------------------
        $mealPlan->save();
    }

    // Redirect or show a success message
    return redirect()->route('showDiet')->with('success', 'Your diet has been created successfully.');
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



public function calculatePersonalizedGrams($user, $totalCalories, $foodCalories)
{
    // Calculate grams based on food calories and total calories for the day
    $grams = ($foodCalories / $totalCalories) * 100;

    return $grams;
}









// --------------------------------- This Method will allow users to update their Diet--------------------------


public function index2()
{
    if (Auth::user()) {
        $user = Auth::user();
        
        // Retrieve the user's current diet based on the current week
        $diet = userDiet::where('fk_signUp_id', $user->id)
            ->whereDate('week_start_date', '<=', now())
            ->whereDate('week_end_date', '>=', now())
            ->first();

        if ($diet) {
            // Retrieve the user's meal plans for the current diet
            $mealPlans = userMealPlan::where('fk_diet_id', $diet->diet_id) ->get();

            // Retrieve all available foods for selection
            $foods = Foods::all();

            return view('updateDiet', compact('mealPlans', 'foods'));
        } else {
            // No active diet found for the user
            return redirect()->route('showDiet')->with('error', 'No active diet found.');
        }
    }
}







public function updateDiet(Request $request)
{
    // Validate the form data
    $request->validate([
        'foods' => 'required|array|min:20|max:30',
        'meal_types' => 'required|array|min:20|max:30',
        'meal_types.*' => 'required|in:breakfast,lunch,dinner,snacks',
        'days' => 'required|array|min:20|max:30',
        'days.*' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
    ]);

    $foods = $request->input('foods');
    $mealTypes = $request->input('meal_types');
    $days = $request->input('days');

    // Retrieve the user's current diet based on the current week
    $user = Auth::user();
    $diet = userDiet::where('fk_signUp_id', $user->id)
        ->whereDate('week_start_date', '<=', now())
        ->whereDate('week_end_date', '>=', now())
        ->first();

    if ($diet) {
        // Delete the existing meal plans for the current diet
        userMealPlan::where('fk_diet_id', $diet->diet_id)->delete();

        $totalCalories = 0;


        foreach ($foods as $index => $foodId) {
            $food = Foods::find($foodId);
            $totalCalories += $food->calories;

            $mealPlan = new UserMealPlan();
            $mealPlan->day_of_week = $days[$index];
            $mealPlan->mealType = $mealTypes[$index];
            $mealPlan->fk_signUp_id = auth()->user()->id;
            $mealPlan->fk_food_id = $foodId;
            $mealPlan->fk_diet_id = $diet->diet_id;
            $mealPlan->personalized_calories = $this->calculatePersonalizedCalories($user, $totalCalories);
            $mealPlan->personalized_grams = $this->calculatePersonalizedGrams(auth()->user(), $totalCalories, $food->calories);
            $mealPlan->save();
        }
        $diet->week_start_date = now();
        $diet->week_end_date = now()->addDays(7);
        $diet->save();

        // Redirect or show a success message
        return redirect()->route('showDiet')->with('success', 'Your diet has been updated successfully.');
    } else {
        // No active diet found for the user
        return redirect()->route('showDiet')->with('error', 'No active diet found.');
    }
}



public function destroyDiet($id){

    

    $user = Auth::user();
    $diet = userDiet::where('fk_signUp_id', $user->id)->find($id);

    if($diet){

        $diet->delete();


        return redirect()->back()->with('info','Your Diet has been deleted successfully!');
    } else{
        return redirect()->back()->with('error', 'Failed to delete the diet.');
    }

   
    

}



}