<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Recipes;

class RecipesController extends Controller
{



    public $user;



    public function getRecipes()
    {

        $this->user=Auth::user();
       
        $data = Recipes::all();

        return view('recipesTips', compact('data'));

        
    }


    public function saveRecipe(array $data){

        $this->user=Auth::user();

        if($this->user && ($this->user->is_admin || $this->user->is_superadmin)){






            Recipes::create($data);

            return redirect()->back()->with('success','Recipe has been added successfully.');


        }else{
            return redirect()->back()->with('error','Unauthorized action');
        }




    }







}
