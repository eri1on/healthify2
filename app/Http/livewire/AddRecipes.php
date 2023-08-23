<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\RecipesController;
use App\Models\Recipes;

class AddRecipes extends Component
{





   public $title;
   public $description;





   protected $rules=[

       'title'=>'required|string|min:5|max:255',
       'description'=>'required|string|min:30',

   ];





   public function sendData(){

     $validatedData=$this->validate();


     $validatedData['description'] = preg_replace('/\s+/', ' ', trim($validatedData['description']));

     $recipeController= new RecipesController();

     $recipeController->saveRecipe($validatedData);

   }



   public function updated($field){

    $this->validateOnly($field);
 }









    public function render()
    {
        return view('livewire.add-recipes');
    }
}
