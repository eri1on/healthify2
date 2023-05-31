<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userMealPlan;
use App\Models\Foods;

use App\Models\User;
class ShowDietController extends Controller
{
    //


    public function showDiet(){
  
        $user=Auth::user();

       if(!$user){
        return redirect->route('/');
       }else{
         $diet = UserMealPlan::with('food')
            ->where('fk_signup_id', $user->id)
            ->orderBy('day_of_week')
            ->get();
            
             return view('user-diet',compact('diet'));

       }
        

    }

    
}
