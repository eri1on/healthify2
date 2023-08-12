<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Hash;


class SignupValidation extends Component
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

    public function rules(){
    return [
        'name' => 'required|string|min:2',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'age' => 'required|integer|min:18',
        'gender' => 'required|in:male,female',
        'height' => 'required|integer|between:100,350',
        'weight' => 'required|integer|between:30,400',
        'goal' => 'required|in:lose_weight,gain_weight',
        'activity' => 'required|in:low_activity,high_activity',
    ];
}

    public function signupSubmit() {
        $validatedData = $this->validate();
        $registerController = new RegisterController();

        // Call the create method on the instance
        $user = $registerController->create($validatedData);
        
        auth()->login($user);

        return redirect('/MyDiet');
    }


    public function updated($field){

        $this->validateOnly($field);
     }


    public function render()
    {
        return view('livewire.signup-validation');
    }
}
