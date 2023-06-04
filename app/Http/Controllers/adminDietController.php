<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\userDiet;
use App\Models\userMealPlan;
use App\Models\Foods;


class adminDietController extends Controller
{


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




    public function editDiet($id){
         $user=auth()->user();

         if($user&&(Auth::user()->is_admin||Auth::user()->is_superadmin)){


            $findDiet=userDiet::where('diet_id',$id)->first();
            $foods=Foods::all();
           

            if($findDiet!==null){
                $mealPlans=userMealPlan::where('fk_diet_id',$findDiet->diet_id)->get();

                
                return view('adminDietEdit', compact('findDiet','mealPlans','foods'));

            }else{
                return redirect()->back()->with('error','Something went wrong!');
            }

         }else{
            return redirect()->route('myDiet')->with('error','Unauthorized Action!');
         }

    }



    

}
