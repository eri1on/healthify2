<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //
    
    public function getData(){

        $user=Auth::user();
        if ($user && ($user->is_admin || $user->is_superadmin)) {

     $users=User::all();

     return view('user-info',compact('users'));
        }else {
            return redirect()->route('index');
        }
    }

    
    //This method will fetch the user's informations from the database and return the 'admin-user-edit' view.
    public function edit($id){

        $user=User::findOrFail($id);

        return view('admin-user-edit',compact('user'));
    }


    // Update method
   
    public function update(Request $request ,$id){

        $user=User::findOrFail($id);

        if(Auth::user() && (Auth::user()->is_superadmin || (Auth::user()->is_admin && !$user->is_admin && !$user->is_superadmin))){  //Check if the user is an admin
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255',                            'regex:/^[a-zA-z]{2,}/'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed',              'regex:/^.{8,}$/'],
            'age' => ['required', 'numeric', 'min:18',                              'regex:/^\d{2}$/'],
            'gender' => ['required', 'in:male,female',                              'regex:/^(male|female)$/i'],
            'height' => ['required', 'numeric', 'min:100', 'max:350',                 'regex:/^(?:[1-2]\d{2}|3[0-4]\d|350)$/'],
            'weight' => ['required', 'numeric', 'min:30', 'max:400',                 'regex:/^([3-9][0-9]{1}|[1-9][0-9]{2}|400)$/'],
            'goal' => ['required', 'in:lose_weight,gain_weight',                    'regex:/^(lose_weight|gain_weight)$/i'],
            'activity' => ['required', 'in:high_activity,low_activity',             'regex:/^(high_activity|low_activity)$/i'],
            'is_admin' => ['boolean'],
            'is_superadmin' => ['boolean'],
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->age = $validatedData['age'];
        $user->gender = $validatedData['gender'];
        $user->height = $validatedData['height'];
        $user->weight = $validatedData['weight'];
        $user->goal = $validatedData['goal'];
        $user->activity = $validatedData['activity'];
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }else {
            // If the password fields are not filled, use the user's current password
            $user->password = $user->getOriginal('password');
        }
        
        if (Auth::user()->is_superadmin && $request->has('is_admin')){
        $user->is_admin = $request->input('is_admin', false);
        }
         if(Auth::user()->is_superadmin &&$request->has('is_superadmin')){
        $user->is_superadmin=$request->input('is_superadmin',false);
        }

      
        if($user->isDirty()){

        $user->save(); // save changes

        return redirect()->route('userinfoshow')->with('success', 'User updated Successfully.');
        }else {
            return redirect()->route('userinfoshow')->with('info', 'No changes were made to the user.');
        }
    }else{
        return redirect()->back()->with('error', 'Unauthorized Action!'); //handles Unauthorized access(Gives an error message)
    }
    }

    
    // Destroy or delete Method

    public function destroy($id){
        $user=User::findOrFail($id);
        if (Auth::user() && (Auth::user()->is_superadmin || (Auth::user()->is_admin && !$user->is_admin && !$user->is_superadmin))){   //Check if user is an admin
        
        $user->delete();   //delete the user.
        return redirect()->route('userinfoshow')->with('success','User Deleted Successfully');
        }else{
            return redirect()->back()->with('error', 'Unauthorized Action!');  //handles Unauthorized access(Gives an error message)
        }
    }



}
