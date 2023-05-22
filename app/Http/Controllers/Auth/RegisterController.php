<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo ='/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255',                            'regex:/^[a-zA-z\s]{2,}/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed',              'regex:/^.{8,}$/'],
            'age' => ['required', 'numeric', 'min:18',                              'regex:/^\d{2}$/'],
            'gender' => ['required', 'in:male,female',                              'regex:/^(male|female)$/i'],
            'height' => ['required', 'numeric', 'min:100', 'max:350',                 'regex:/^(?:[1-2]\d{2}|3[0-4]\d|350)$/'],
            'weight' => ['required', 'numeric', 'min:30', 'max:400',                 'regex:/^([3-9][0-9]{1}|[1-9][0-9]{2}|400)$/'],
            'goal' => ['required', 'in:lose_weight,gain_weight',                    'regex:/^(lose_weight|gain_weight)$/i'],
            'activity' => ['required', 'in:high_activity,low_activity',             'regex:/^(high_activity|low_activity)$/i'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'age' => $data['age'], // add new column
            'gender' => $data['gender'], // add new column
            'height' => $data['height'], // add new column
            'weight' => $data['weight'], // add new column
            'goal' => $data['goal'], // add new column
            'activity' => $data['activity'], // add new column
            'is_admin' =>false,
            'is_superadmin'=>false
        ]);
    }
}
