<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Contact;
use App\Models\User;
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


    public function mount(){
        $user=Auth::user();
        $this->firstname=$user->name;
        $this->email=$user->email;
        
    }




    public function submitForm(){

        $user=Auth::user();
      

        $this->validate();

        $trimmedMessage = preg_replace('/\s+/', ' ', trim($this->message)); 

        Contact::create([
          'firstName'=>$user->name,
          'email'=>$user->email,
          'phone'=>$this->phone,
          'message' => $trimmedMessage ,
          'fk_signUp_id' => $user->id, // Set the fk_signUp_id based on the authenticated user


        ]);

        session()->flash('success', 'Your message has been sent!'); 
        
      

        $this->reset(['phone','message']);
      
       
    }




   

    public function render(){

        return view('livewire.contact-form');
    }









    


}
