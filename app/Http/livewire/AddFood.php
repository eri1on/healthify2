<?php

namespace App\Http\Livewire;


use Livewire\Component;
use app\Http\Controllers\FoodsController;

class AddFood extends Component
{




   public $nameOfFood;
   public $category;
   public $proteins;
   public $vitamins;
   public $calories;
   public $carbohydrates;


   public function rules(){

      return [
        'nameOfFood'=>['required','string','min:2','max:255', 'regex: /^[a-zA-Z\s]{2,}$/'],
        'category'=>['required','string','min:2', 'max:255',  'regex:/^[A-Za-z\s]{2,}$/'],
        'proteins'=>['required','numeric', 'min:0',            'regex: /^\d+(\.\d+)?$/'],
        'vitamins'=>['required' , 'in:a,b,c,d,e'],
        'calories'=>['required', 'numeric',  'min:0',          'regex:/^\d+(\.\d+)?$/'],
        'carbohydrates'=>['required','numeric','min:0',        'regex:/^\d+(\.\d+)?$/']

      ];

   }






   public function addFoodSubmit(){

    $validatedData=$this->validate();

    $foodscontroller= new FoodsController();

    $foodscontroller->store($validatedData);

    return redirect('dashboard-foods');



   }





   public function updated($field){

    $this->validateOnly($field);

   }

    public function render()
    {
        return view('livewire.add-food');
    }
}
