<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Recipes;
use Livewire\WithFileUploads;


class adminRecipeEdit extends Component{
   use WithFileUploads;



    public $user;
    public $RecipeId;
    public $title;
    public $description;
    public $image;
    public $currentImage;


   protected $rules=[

    'title'=>'required|string|min:5|max:255',
    'description'=>'required|string|min:30',
    'image' => 'nullable|image|max:2024'

];



public function mount($recipeId) {
    $this->RecipeId = $recipeId;
    $data = Recipes::findOrFail($this->RecipeId);
    $this->title = $data->title;
    $this->description = $data->description;
    $this->currentImage = $data->image;
}



public function editRecipe($id){

    $this->user=Auth::user();

    if($this->user && ($this->user->is_admin || $this->user->is_superadmin)){

    $recipeData=Recipes::findOrFail($id);


    return view('admin-recipe-edit',compact('recipeData'));
    }else{
        return redirect()->back()->with('error','Unauthorized action');
    }


}




    public function updated($field){

        $this->validateOnly($field);
     }



    public function updateRecipe(){

        $this->user=Auth::user();

        if($this->user && ($this->user->is_admin || $this->user->is_superadmin)){

        $validatedData=$this->validate();

        if ($this->image) {
            
            $imagePath = $this->image->store('images', 'public');// If a new image is provided, save it
            $validatedData['image'] = $imagePath;
        } else {
            // If no new image is provided, retain the current image
            $validatedData['image'] = $this->currentImage;
        }

        
        $toUpdate=Recipes::findOrFail($this->RecipeId);

        $toUpdate->update($validatedData);
        $this->currentImage = $toUpdate->image;



        return redirect()->back()->with('success', 'Recipe updated Successfully.');

        }else{
            return redirect()->back()->with('error','Unauthorized action');
        }


    }





    public function destroy($Id){
        $this->user=Auth::user();
        if($this->user && ($this->user->is_admin || $this->user->is_superadmin)){

            $toDelete=Recipes::findOrFail($Id);

            $toDelete->delete();

        return redirect()->back()->with('success', 'Recipe Deleted Successfully.');


        }else{
            return redirect()->back()->with('error','Unauthorized action');
        }



    }


    public function render()
    {
        return view('livewire.admin-recipe-edit');
    }
}
