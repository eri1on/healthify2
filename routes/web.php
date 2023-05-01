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
    
    Route::get('/login1', function () {
        return view('login1');
    })->name('login1');
    
    Route::get('/SignUp', function () {
        return view('SignUp');
    })->name('signup');
    
    Route::get('/recipesTips', function () {
        return view('recipesTips');
    })->name('recipes');
    
    Route::get('/MyDiet', function () {
        return view('MyDiet');
    })->name('myDiet');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    Route::get('/dashboard', function () {
        return view('dashboard');
        
    })->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
