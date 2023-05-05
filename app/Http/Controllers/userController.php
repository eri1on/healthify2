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



}
