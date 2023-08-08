<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;


class ContactForm extends Component
{
   

    public $firstname;
    public $email;
    public $phone;
    public $message;

  


    protected $rules=[

    'firstname'=>'required|string|min:2|max:255',
    'email'=>'required|email|max:255',
    'phone'=>'required|string|min:9|max:20|regex:/^\d{1,20}$/',
    'message'=>'required|string|max:255',


    ];




    public function submitForm(){


      

        $this->validate();

        Contact::create([
          'firstName'=>$this->firstname,
          'email'=>$this->email,
          'phone'=>$this->phone,
          'message'=>$this->message,
          'fk_signUp_id' => Auth::id(), // Set the fk_signUp_id based on the authenticated user


        ]);

        session()->flash('success', 'Your message has been sent!'); 

      

        $this->reset(['firstname', 'email','phone','message']);
       
    }

    public function render(){
        return view('livewire.contact-form');
    }









    


}
