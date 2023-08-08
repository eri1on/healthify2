<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('firstName',255);
            $table->string('email',255);
            $table->string('phone',20);
            $table->text('message',255);
            $table->unsignedBigInteger('fk_signUp_id');
            $table->timestamps();


            $table->foreign('fk_signUp_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
           
           

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
