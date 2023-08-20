<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foods;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class FoodsController extends Controller
{

    //This method is created to only allow admins and superadmins to be able to access the 'add-food'  view
     public function showForm(){
        $user=Auth::user();
        if ($user && ($user->is_admin || $user->is_superadmin)){
            return view('add-food');
        }else{
            return redirect('/')->with('You are not allowed to access this page!');
        }
     }
   
   //this methods is used to store or save foods into database table 'foods'
    public function store(array $data){
        $user = auth()->user();

        
        if(Auth::user() && (Auth::user()->is_superadmin || Auth::user()->is_admin)){
        Foods::create($data);// Create a new row in the 'foods' table with the validated data

        return redirect('dashboard-foods')->with('success','Food added successfully!');
    }else{
        return redirect()->back()->with('error', 'Unauthorized action!');
    }

    }


//This methods displayes all the foods in the view called 'dashboard-foods.blade.php'


   public function getAllFoods(){
     $user=Auth::user();
     if ($user && ($user->is_admin || $user->is_superadmin)){
     $allFoods=Foods::all();
     return view('dashboard-foods',compact('allFoods'));
     }else{
        return redirect('/')->with('error','You are not allowed to access this page!');
     }
   }




   public function edit($id){

    $user=Auth::user();
    
    if($user&&($user->is_admin||$user->is_superadmin)) {
        $food=Foods::findOrFail($id);
        return view('admin-food-edit',compact('food'));
      
    }else{
        return redirect()->back()->with('error', 'Something went wrong!');
    }
      
   }




   






   public function delete($id){
    $user=Auth::user();
    if($user&&($user->is_admin||$user->is_superadmin)){
        $food=Foods::findOrFail($id);
        $food->delete();
        return redirect()->route('dashboard-foods')->with('success','Food Deleted Successfully');
    }else{
        return redirect()->back()->with('error', 'Unauthorized Action!'); 
    }
   }



   


 

 




}
