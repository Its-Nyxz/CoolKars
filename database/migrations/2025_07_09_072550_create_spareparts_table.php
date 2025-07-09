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
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('sparepart_code')->unique(); // Misal: KMPS-REM-FRD-EVST
            $table->string('name')->nullable();
            $table->boolean('status')->default(true); // aktif / nonaktif
            $table->boolean('denso')->default(false); // apakah sparepart dari Denso
            $table->tinyInteger('owning')->nullable()->comment('0 = CoolKars, 1 = Trading');
            $table->foreignId('uom_id')->nullable()->constrained('uoms')->onDelete('set null'); // relasi ke uom
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
        Schema::dropIfExists('spareparts');
    }
};
