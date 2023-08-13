<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

class ProfileUpdate extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $age;
    public $gender;
    public $height;
    public $weight;
    public $goal;
    public $activity;
    public $user;


public function rules(){

return [


    'name' => 'required|string|min:2',
    'email' => 'required|email|unique:users,email,' . Auth::id(), // we don't want the existing email to be considered as a duplicate, we are just updating profile
    'password' => 'nullable|string|min:8|confirmed',
    'age' => 'required|integer|min:18',
    'gender' => 'required|in:male,female',
    'height' => 'required|integer|between:100,350',
    'weight' => 'required|integer|between:30,400',
    'goal' => 'required|in:lose_weight,gain_weight',
    'activity' => 'required|in:low_activity,high_activity',

];

}


    public function profileUpdate(){

      $validatedData=$this->validate();



    $ProfileController= new ProfileController();

    
    $ProfileController->update($validatedData);
     

    
      return redirect()->back()->with('success', 'Profile Updated Successfuly.');



    }





    public function updated($field){

        $this->validateOnly($field);
     }



    public function mount(){
        $this->user=Auth::user();

        $this->name=$this->user->name;
        $this->email=$this->user->email;
     
        $this->age=$this->user->age;
        $this->gender=$this->user->gender;
        $this->height=$this->user->height;
        $this->weight=$this->user->weight;
        $this->goal=$this->user->goal;
        $this->activity=$this->user->activity;
    
    }





   


    public function render()
    {
        return view('livewire.profile-update');
    }
}
