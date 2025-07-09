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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('companie_code')->nullable()->unique();         // Company ID
            $table->string('name')->nullable();                           // Company Name
            $table->text('address_1')->nullable();            // Address 1
            $table->string('phone')->nullable();              // Phone
            $table->string('fax')->nullable();                // Fax
            $table->string('email')->nullable();              // Email
            $table->string('npwp')->nullable();               // NPWP
            $table->boolean('is_active')->default(true);

            // Bank fields
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();

            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
