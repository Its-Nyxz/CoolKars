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
        Schema::create('car_parameters', function (Blueprint $table) {
            $table->id();
            $table->string('parameter_code')->unique()->nullable(); // e.g., PRM001
            $table->string('name')->nullable();                   // Parameter Name
            $table->tinyInteger('category')->comment('0=Checking, 1=Service')->nullable();
            $table->string('image')->nullable();      // Optional image path
            $table->text('description')->nullable();
            $table->boolean('status')->default(true); // Active or not

            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_parameters');
    }
};
