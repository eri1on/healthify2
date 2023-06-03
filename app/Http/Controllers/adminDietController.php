<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\userDiet;


class adminDietController extends Controller
{


    public function showUsersDiets(){
     $user=Auth()->user();
        if($user&&(Auth::user()->is_superadmin||Auth::user()->is_admin)){

           $allUsersDiets= userDiet::All();
           

           return view('dashboard-usersDiet',compact('allUsersDiets'));

        }else{
            return redirect()-back()->with('error','Unauthorized access!');
        }
    }
    


    public function deleteDiet($id){

        $findDiet=userDiet::findOrFail($id);
        
        if($findDiet){
            
            $findDiet->delete();

            return redirect()->route('admin-diet-dashboard')->with('success','User Diet Deleted Successfully.');
        }else{
            return redirect()-route('admin-diet-dashboard')->with('error','Something went wrong!');
        }

    }


}
