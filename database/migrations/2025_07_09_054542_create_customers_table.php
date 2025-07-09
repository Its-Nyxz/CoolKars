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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code')->nullable();
            $table->string('name')->nullable();
            $table->tinyInteger('type')->nullable()->comment('0=User, 1=Corporate, 2=Dealer, 3=Distributor');
            $table->string('email')->nullable()->unique();
            $table->string('phone_number')->nullable();
            $table->date('contract_start_date')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->string('document')->nullable()->comment('Path dokumen yang diupload');
            $table->tinyInteger('payment_term')->nullable()->comment('0=COD, 1=7 Hari, 2=14 Hari, 3=30 Hari, 4=60 Hari');
            $table->boolean('is_blacklisted')->default(false);
            $table->boolean('status')->default(true); // active or not
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
