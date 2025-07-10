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
        Schema::create('commission_rules', function (Blueprint $table) {
            $table->id();
            // Relasi ke car_types (misalnya: Small, Medium, etc.)
            $table->foreignId('car_type_id')->nullable()->constrained('car_types')->onDelete('cascade');

            // Relasi ke type_services (misalnya: LIGHT SERVICE, AC CARE, etc.)
            $table->foreignId('type_service_id')->nullable()->constrained('type_services')->onDelete('cascade');

            // Jenis AC (bisa null untuk AC-independent service)
            $table->string('ac_system')->nullable(); // e.g. SINGLE, DOUBLE, I, II, III

            // Komisi dasar (untuk mekanik/helper, dsb)
            $table->decimal('base_commission', 12, 2);

            // Tanda bahwa ini rule untuk dealer atau non-dealer
            $table->boolean('is_dealer')->default(false); // false = non-dealer

            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commission_rules');
    }
};
