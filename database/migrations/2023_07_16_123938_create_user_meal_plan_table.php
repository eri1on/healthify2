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
            $table->string('day_of_week', 255); 
            $table->string('mealType',9);
            $table->unsignedBigInteger('fk_signUp_id');
            $table->unsignedBigInteger('fk_food_id');
            $table->unsignedBigInteger('fk_diet_id');
            $table->float('personalized_calories');
            /*
            $table->float('portion_size');
            
            $table->float('personalized_grams');
            */
            $table->float('proteinGram');

            $table->float('carbohydratesGram');
            
            $table->timestamps();

            $table->foreign('fk_signUp_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_food_id')->references('food_id')->on('foods')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_diet_id')->references('diet_id')->on('user_diet')->onDelete('cascade')->onUpdate('cascade');
        
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
