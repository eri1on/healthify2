<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userMealPlan extends Model
{
  

    protected $table='user_meal_plan';
    protected $primaryKey='meal_plan_id';
    use HasFactory;

     protected $fillable=[
         'day_of_week',
         'mealType',
         'fk_signUp_id',
         'fk_food_id',
         'fk_diet_id',

     ];
}
