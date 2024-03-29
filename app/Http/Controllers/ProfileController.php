<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;




class ProfileController extends Controller
{



    public function show(){
        $user = Auth::user();
        return view('user-personaldashboard', compact('user'));

    }
    


    
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }





    /**
     * Update the user's profile information.
     */
    public function update(array $validatedData)
    {

      

    
        $user = Auth::user();
        $user->fill($validatedData);
    
        // Hash the password if it is not empty
        if (isset($validatedData['password']) && $validatedData['password'] !== null) {
            $user->password = Hash::make($validatedData['password']);
        } else {
            // If the password fields are not filled, use the user's current password
            $user->password = $user->getOriginal('password');
        }

    
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
       
     
        
        $user->save();
    
        return Redirect::route('userprofileshow')->with('success', 'Profile updated successfully');
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }








}
