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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama file / dokumen
            $table->string('path'); // path file di storage
            $table->string('type')->nullable(); // jenis dokumen (opsional)

            // Polymorphic fields
            $table->morphs('documentable'); // akan membuat: documentable_id & documentable_type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
