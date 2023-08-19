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
