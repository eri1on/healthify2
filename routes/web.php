<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use App\Http\Controllers\FoodsController;
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
    
   
    
   
    /*These are  user 'ProfileController' Routes,Where these methods can be used to allow  user to edit,update or delete their account*/
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user-profile',[ProfileController::class, 'show'])->name('userprofileshow');

    /*These will be 'Routes' for admin  'userController' where admin can use these methods to delete an accout or edit,update simple user's account*/
    Route::get('/user-info',[userController::class,'getData'])->name('userinfoshow'); //shows all users and all their info that are saved in database
    Route::get('/admin-user-edit/{id}',[userController::class,'edit'])->name('admin-user-edit');
    Route::delete('admin-user-delete/{id}',[userController::class,'destroy'])->name('admin-user-delete');
    Route::put('admin-user-update/{id}',[userController::class,'update'])->name('admin-user-update');
    // --------------------------
    Route::get('/foods/create',[FoodsController::class,'showForm'])->name('showCreateFoodForm');
    Route::post('/foods',[FoodsController::class,'store'])->name('foods.store');
    Route::get('/selectFood',[FoodsController::class,'getFoods'])->name('select-food');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


