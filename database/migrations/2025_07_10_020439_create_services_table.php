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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_code')->nullable()->unique(); // Misal: KMPS-REM-FRD-EVST
            $table->string('name')->nullable();
            $table->boolean('status')->default(true); // aktif / nonaktif
            $table->foreignId('type_service_id')->nullable()->constrained('type_services')->onDelete('set null');
            $table->string('image_path')->nullable(); // jika ada upload gambar
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
