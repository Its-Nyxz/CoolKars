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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('site_code')->unique()->nullable();
            $table->string('name')->nullable();
            $table->unsignedTinyInteger('category')->default(0);
            $table->foreignId('company_id')->nullable()->constrained('companies')->onDelete('cascade');
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_active')->default(true);

            $table->decimal('target_omset_monthly', 15, 2)->nullable();
            $table->decimal('commission_achieved', 5, 2)->nullable(); // persen
            $table->decimal('commission_not_achieved', 5, 2)->nullable(); // persen

            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
