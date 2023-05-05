<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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
        $user=User::findOrFail($id);

        $user->name=$request->input('name'); // update the name.
        $user->email=$request->input('email'); //UPDATE the Emaiil
        $user->age=$request->input('age');
        $user->gender=$request->input('gender');
        $user->height=$request->input('height');
        $user->weight=$request->input('weight');
        $user->goal=$request->input('goal');
        $user->activity=$request->input('activity');
        $user->is_admin=$request->input('is_admin');
        $user->save();  // save changes

        return redirect()->route('userinfoshow')->with('success', 'User updated Successfully.');
    }

    
    // Destroy or delete Method

    public function destroy($id){
        $user=User::findOrFail($id);
        $user->delete();   //delete the user.
        return redirect()->route('userinfoshow')->with('success','User Deleted Successfully');
    }



}
