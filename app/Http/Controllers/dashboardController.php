<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class dashboardController extends Controller
{
   public function showDashboardDetails(){
    $user=Auth::user();
    if($user && ($user->is_admin||$user->is_superadmin)){
        return view('dashboard');
    }else{
        return redirect('/')->with('error','You are not allowed to access that page!');
    }
   }
}
