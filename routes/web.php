<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');





Route::middleware('auth')->group(function () {



    Route::get('/contact-us', function () {
        return view('contact-us');
    })->name('contactUs');
    

    Route::get('/Signup', function () {
        return view('auth.register');
    })->name('signup');
    
    Route::get('/recipesTips', function () {
        return view('recipesTips');
    })->name('recipes');
    
    Route::get('/MyDiet', function () {
        return view('MyDiet');
    })->name('myDiet');
    
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user-profile',[ProfileController::class, 'show'])->name('userprofileshow');
  
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


