<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //

    public function getData(){

     $users=User::all();

     return view('user-info',compact('users'));

    }

    
    //This method will fetch the user's informations from the database and return the 'admin-user-edit' view.
    public function edit($id){

        $user=User::findOrFail($id);

        return view('admin-user-edit',compact('user'));
    }


    // Update method

    public function update(Request $request ,$id){

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
        ]);
        



        $user=User::findOrFail($id);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->age = $validatedData['age'];
        $user->gender = $validatedData['gender'];
        $user->height = $validatedData['height'];
        $user->weight = $validatedData['weight'];
        $user->goal = $validatedData['goal'];
        $user->activity = $validatedData['activity'];
        $user->is_admin = $request->input('is_admin', false);
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }else {
            // If the password fields are not filled, use the user's current password
            $user->password = $user->getOriginal('password');
        }
        $user->save(); // save changes

        return redirect()->route('userinfoshow')->with('success', 'User updated Successfully.');
    }

    
    // Destroy or delete Method

    public function destroy($id){
        $user=User::findOrFail($id);
        $user->delete();   //delete the user.
        return redirect()->route('userinfoshow')->with('success','User Deleted Successfully');
    }



}
