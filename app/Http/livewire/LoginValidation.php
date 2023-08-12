<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginValidation extends Component
{
    public $email;
    public $password;
    

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required',
    ];

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',  //it's checking if the given email exists in the users table under the email column.
            'password' => 'required',
        ]);
    
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
    
        if (auth()->attempt($credentials)) {
            return redirect('/'); // Redirect to the home page upon successful login
        } else {
            $this->addError('password', 'Wrong password');
        }
    }
    public function updated($field){

        $this->validateOnly($field);
     }
    

    public function render()
    {
        return view('livewire.login-validation');
    }
}