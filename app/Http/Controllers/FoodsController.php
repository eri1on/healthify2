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
   
   
    public function store(Request $request){
        $user = auth()->user();


        $validatedData=$request->validate([
         'nameOfFood'=>['required','string','max:255', 'regex:/^[A-Za-z]{2,}$/'],
         'category'=>['required','string', 'max:255',  'regex:/^[A-Za-z]{2,}$/'],
         'proteins'=>['required','numeric',             'regex: /^\d+(\.\d+)?$/'],
         'vitamins'=>['required' , 'in:a,b,c,d,e'],
         'calories'=>['required', 'numeric',            'regex:/^\d+(\.\d+)?$/'],
         'carbohydrates'=>['required','numeric',        'regex:/^\d+(\.\d+)?$/'],

        ]); 
        if(Auth::user() && (Auth::user()->is_superadmin || Auth::user()->is_admin)){
        Foods::create($validatedData);// Create a new row in the 'foods' table with the validated data

        return redirect()->back()->with('success','Food added successfully!');
    }else{
        return redirect()->back()->with('error', 'Unauthorized action!');
    }

    }


    //this method displayes all the foods in the view called 'select-foods.blade.php'
    public function getFoods(){
        $user=Auth::user();

        $allFoods=Foods::all();

        return view('select-food',compact('allFoods'));
    }



}
