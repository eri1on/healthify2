<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\userDiet;
use App\Models\userMealPlan;
use App\Models\Foods;
use App\Http\Traits\DietCalculationsTrait;



class adminDietController extends controller
{
    use DietCalculationsTrait;



    public function showUsersDiets(){
     $user=Auth()->user();
        if($user&&(Auth::user()->is_superadmin||Auth::user()->is_admin)){

           $allUsersDiets= userDiet::All();
           
           

           return view('dashboard-usersDiet',compact('allUsersDiets'));

        }else{
            return redirect()->route('myDiet')->with('error','Unauthorized access!');
        }
    }
    


    public function deleteDiet($id){


       $user=auth()->user();
       if($user&&(Auth::user()->is_superadmin||Auth::user()->is_admin)){

        $findDiet=userDiet::findOrFail($id);

      
        
        if($findDiet){
            
            $findDiet->delete();

            return redirect()->route('admin-diet-dashboard')->with('success','User Diet Deleted Successfully.');
        }else{
            return redirect()->route('admin-diet-dashboard')->with('error','Something went wrong!');
        }
    }else{
        return redirect()->route('myDiet')->with('error','Unauthorized access!');
    }

    }




    public function editDiet($id,$userid){
         $user=auth()->user();

         if($user&&(Auth::user()->is_admin||Auth::user()->is_superadmin)){


            $findDiet=userDiet::where('diet_id',$id)->first();
            $foods=Foods::all();
            $findUser = User::find($userid);

            
            if($findDiet!==null){

                $mealPlans=userMealPlan::where('fk_diet_id',$findDiet->diet_id)->get();

                
                return view('adminDietEdit', compact('findDiet', 'mealPlans', 'foods','findUser'));


            }else{
                return redirect()->back()->with('error','Something went wrong!');
            }

         }else{
            return redirect()->route('myDiet')->with('error','Unauthorized Action!');
         }

    }

    
    /*
    public function calculatePersonalizedGrams($user, $totalCalories, $foodCalories)
    {
        // Calculate grams based on food calories and total calories for the day
        $grams = ($foodCalories / $totalCalories) * 100;
    
        return $grams;
    }
*/
    

public function updateDiet(Request $request,$userid)
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
    $user =User::find($userid);
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
            $mealPlan->fk_signUp_id = $user->id;
            $mealPlan->fk_food_id = $foodId;
            $mealPlan->fk_diet_id = $diet->diet_id;
            $mealPlan->personalized_calories = $this->calculatePersonalizedCalories($user, $totalCalories);
            $mealPlan->carbohydratesGram=$this->calculateCarbohydratesGrams($totalCalories);
            $mealPlan->proteinGram=$this->calculateProteinGram($totalCalories);

            /*
            $mealPlan->personalized_grams = $this->calculatePersonalizedGrams($user->id, $totalCalories, $food->calories);
            */
            $mealPlan->save();
        }
        $diet->week_start_date = now();
        $diet->week_end_date = now()->addDays(7);
        $diet->save();

        // Redirect or show a success message
        return redirect()->back()->with('success', 'User diet has been updated successfully.');
    } else {
        // No active diet found for the user
        return redirect()->route('showDiet')->with('error', 'No active diet found.');
    }
}







}
