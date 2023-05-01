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
        Schema::table('users', function (Blueprint $table) {
        
        $table->integer('age');
        $table->enum('gender', ['female', 'male'])->after('age');
        $table->integer('height')->after('gender');
        $table->integer('weight')->after('height');
        $table->enum('goal', ['lose_weight', 'gain_weight'])->after('weight');
        $table->enum('activity', ['low_activity', 'moderate_activity', 'high_activity'])->after('goal'); 
        $table->boolean('is_admin')->default(false)->after('activity');






        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
