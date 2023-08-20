<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\Foods;

class EditFood extends Component
{
    public $food;

    public $nameOfFood;
    public $category;
    public $proteins;
    public $vitamins;
    public $calories;
    public $carbohydrates;




    public function mount($food){

        $this->food = $food;

        $this->nameOfFood=$this->food->nameOfFood;
        $this->category=$this->food->category;
        $this->proteins=$this->food->proteins;
        $this->vitamins=$this->food->vitamins;
        $this->calories=$this->food->calories;
        $this->carbohydrates=$this->food->carbohydrates;

    }




     public function rules(){


        return [

            'nameOfFood'=>['required','string', 'min:2','max:255'],
            'category'=>['required','string', 'min:2' ,'max:255'],
            'proteins'=>['required','numeric','min:0'],
            'vitamins'=>['required' , 'in:a,b,c,d,e'],
            'calories'=>['required', 'numeric','min:0',],
            'carbohydrates'=>['required','numeric', 'min:0'],


        ];
     }



     public function updateFood(){

           $user=Auth::user();
          
         if($user &&($user->is_admin ||$user->is_superadmin)){

        

            $validatedData=$this->validate();


            $this->food->update($validatedData);
    

            return redirect()->route('dashboard-foods')->with('success', 'Food updated Successfully.');



         }else{
            return redirect()->back()->with('error', 'Unauthorized Action!');
         }


     }











    public function render()
    {
        return view('livewire.edit-food');
    }
}
