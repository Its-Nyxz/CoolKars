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
        Schema::create('type_services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->unique();       // Contoh: "HEAVY SERVICE"
            $table->string('code')->nullable();     // Contoh: "HEAVY"
            $table->text('description')->nullable(); // Keterangan tambahan
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
        Schema::dropIfExists('type_services');
    }
};
