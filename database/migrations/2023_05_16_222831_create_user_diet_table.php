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
        Schema::create('user_diet', function (Blueprint $table) {
            $table->id('diet_id');
            $table->unsignedBigInteger('fk_signUp_id');
            $table->date('week_start_date');
            $table->date('week_end_date');
            $table->timestamps();

            $table->foreign('fk_signUp_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_diet');
    }
};
