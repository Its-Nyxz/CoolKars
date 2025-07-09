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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_code')->unique()->nullable(); // e.g., CR001
            $table->string('brand')->nullable();            // e.g., Toyota
            $table->string('model')->nullable();            // e.g., Avanza
            $table->tinyInteger('type')->comment('0=Medium, 1=CBU, 2=Europe')->nullable();
            $table->string('cc')->nullable();               // e.g., 1500

            // Relasi ke users (yang terakhir mengubah)
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
