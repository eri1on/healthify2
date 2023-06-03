<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\ShowDietController;
use App\Http\Controllers\adminDietController;
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
    Route::get('/foods/create',[FoodsController::class,'showForm'])->name('showCreateFoodForm');//calls a method in order to display the form to create foods
    Route::post('/foods',[FoodsController::class,'store'])->name('foods.store');//insert foods into database
    Route::get('/selectFood',[DietController::class,'index'])->name('select-food');//display all the fodds from database into a view called select-foods
    
    Route::get('/dashboard',[dashboardController::class,'showDashboardDetails'])->name('dashboard');//calls a method in order to display the dashbaord page
     
   // Routes for update and delete foods
    Route::get('/dashboard-foods',[FoodsController::class,'getAllFoods'])->name('dashboard-foods');
    Route::get('/admin-food-edit/{id}',[FoodsController::class,'edit'])->name('admin-food-edit');
    Route::put('/admin-food-update/{id}',[FoodsController::class,'update'])->name('admin-food-update');
    Route::delete('/admin-food-delete/{id}',[FoodsController::class,'delete'])->name('admin-food-delete');


    // --------------------------------------------------These are Routes when 'form' from select-food is submitted-------------
    
    Route::post('/startDiet',[DietController::class,'saveDiet'])->name('startUserDiet');
    //----------------------------This route will  call a method which will display the current auth user diet.//
    Route::get('/showUserDiet',[ShowDietController::class,'showDiet'])->name('showDiet');

    // ---------------------------This route will call the 'update' method which will allow user to update their diet.--
    Route::get('/updateDiet',[DietController::class,'index2'])->name('updateMyDiet');//this returns the 'view'

    Route::put('/UpdateDiet',[DietController::class,'updateDiet'])->name('updateDiet');//this calls the update method

    Route::delete('/deleteMyDiet/{id}',[DietController::class,'destroyDiet'])->name('deleteDiet');


    // -------------------------------- this route is for admin and superadmins to delete diets of the users--
    Route::get('/dashboard-usersDiet',[adminDietController::class,'showUsersDiets'])->name('admin-diet-dashboard');
    Route::delete('/deleteUserDiet/{id}',[adminDietController::class,'deleteDiet'])->name('deleteUserDiet');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


