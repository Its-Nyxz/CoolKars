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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('promo_code')->unique();
            $table->string('name')->nullable();

            // 0 = Sparepart, 1 = Service
            $table->tinyInteger('type')->comment('0 = Sparepart, 1 = Service');

            // Menyimpan ID dari sparepart atau service tergantung tipe
            $table->unsignedBigInteger('related_id')->nullable();

            // Diskon
            $table->decimal('discount', 10, 2)->nullable();

            // 0 = Percent, 1 = IDR
            $table->boolean('discount_type')->default(1)->comment('0 = %, 1 = IDR');

            // Periode promo
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            // Jumlah kuota promo (nullable)
            $table->integer('quantity')->nullable();

            // Status aktif/tidak
            $table->boolean('status')->default(false);

            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
