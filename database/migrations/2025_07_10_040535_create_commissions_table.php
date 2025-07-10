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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();

            // Foreign Keys
            $table->foreignId('site_id')->nullable()->constrained('sites')->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('cascade');

            // Commission fields
            $table->boolean('is_dealer')->default(false); // true: dealer, false: non-dealer
            $table->decimal('total_incentive', 12, 2);

            // Only used when is_dealer = true
            $table->decimal('service_advisor', 12, 2)->nullable();
            $table->boolean('service_advisor_is_percent')->default(false);

            $table->decimal('kabeng', 12, 2)->nullable();
            $table->boolean('kabeng_is_percent')->default(false);

            $table->decimal('admin', 12, 2)->nullable();
            $table->boolean('admin_is_percent')->default(false);

            $table->decimal('kacab', 12, 2)->nullable();
            $table->boolean('kacab_is_percent')->default(false);

            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
