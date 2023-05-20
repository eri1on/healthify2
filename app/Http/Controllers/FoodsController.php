<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foods;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class FoodsController extends Controller
{
   
   
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


    public function getFoods(){
        $user=Auth::user();

        $allFoods=Foods::all();

        return view('select-food',compact('allFoods'));
    }



}
