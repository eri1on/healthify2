<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Http\Controllers\userController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class AdminUserEdit extends Component
{



    public $user;

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
    public $is_admin;
    public $is_superadmin;





    public function mount($userId){


        $this->user=User::findOrFail($userId);
        $this->name=$this->user->name;
        $this->email=$this->user->email;
        $this->age=$this->user->age;
        $this->gender=$this->user->gender;
        $this->height=$this->user->height;
        $this->weight=$this->user->weight;
        $this->goal=$this->user->goal;
        $this->activity=$this->user->activity;
        $this->is_admin=$this->user->is_admin;
        $this->is_superadmin=$this->user->is_superadmin;

    }

    public function rules(){
        return [


            'name' => 'required|min:2',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'password' => 'nullable|min:8|confirmed',
            'age' => 'required|digits:2|integer|min:18',
            'gender' => 'required|in:male,female',
            'height' => 'required|integer|between:100,350',
            'weight' => 'required|integer|between:30,400',
            'goal' => 'required|in:lose_weight,gain_weight',
            'activity' => 'required|in:low_activity,high_activity',
            'is_admin' => 'required|in:0,1',
            'is_superadmin' => 'required|in:0,1',
        ];
    }




    public function updateUser()
{


    if(Auth::user() && (Auth::user()->is_superadmin || (Auth::user()->is_admin && !$user->is_admin && !$user->is_superadmin))){
    $validatedData = $this->validate();

    if (empty($validatedData['password'])) {
        // If the password field is not filled, use the user's current password
        $validatedData['password'] = $this->user->getOriginal('password');
    } else {
        $validatedData['password'] = Hash::make($validatedData['password']);
    }


    if (Auth::user()->is_superadmin && isset($validatedData['is_admin'])){
        $this->user->is_admin = $validatedData['is_admin'];
        }
         if(Auth::user()->is_superadmin && isset($validatedData['is_superadmin'])) {
            $this->user->is_superadmin = $validatedData['is_superadmin'];
        }




    $this->user->update($validatedData);

    return redirect()->route('userinfoshow')->with('success', 'User updated Successfully.');

        



    }else{
        return redirect()->back()->with('error', 'Unauthorized Action!'); //handles Unauthorized access(Gives an error message)
    }
}




public function updated($field){
    $this->validateOnly($field);
}




    public function render()
    {
        return view('livewire.admin-user-edit');
    }
}
