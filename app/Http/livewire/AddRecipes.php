<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\RecipesController;
use App\Models\Recipes;
use Livewire\WithFileUploads;

class AddRecipes extends Component
{

    use WithFileUploads;



   public $title;
   public $description;
   public $image;




   protected $rules=[

       'title'=>'required|string|min:5|max:255',
       'description'=>'required|string|min:30',
       'image' => 'nullable|image|max:2024',

   ];





   public function sendData(){

     $validatedData=$this->validate();


     if ($this->image) {
        $imagePath = $this->image->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }
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
