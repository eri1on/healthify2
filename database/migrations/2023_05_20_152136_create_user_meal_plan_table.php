<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_meal_plan', function (Blueprint $table) {
            $table->id('meal_plan_id');
            $table->enum('day_of_week', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);
            $table->enum('mealType',['Breakfast','Lunch','Dinner','Snacks']);
            $table->unsignedBigInteger('fk_signUp_id');
            $table->unsignedBigInteger('fk_food_id');
            $table->unsignedBigInteger('fk_diet_id');
            $table->timestamps();

            $table->foreign('fk_signUp_id')->references('id')->on('users');
            $table->foreign('fk_food_id')->references('food_id')->on('foods');
            $table->foreign('fk_diet_id')->references('diet_id')->on('user_diet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_meal_plan');
    }
};
