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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_number')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->unsignedBigInteger('performer_amount')->nullable();
            $table->boolean('performer_is_paid')->nullable();
            $table->text('download_address')->nullable();
            $table->text('uploading_address')->nullable();
            $table->timestamp('download_date')->nullable();
            $table->timestamp('unloading_date')->nullable();
            $table->unsignedInteger('cargo_weight')->nullable();
            $table->unsignedInteger('cargo_volume')->nullable();
            $table->string('cargo_name')->nullable();
            $table->string('invoice_number')->nullable();
            $table->boolean('invoice_is_sent')->nullable();
            $table->timestamp('invoice_payment_date')->nullable();
            $table->unsignedInteger('management_payment')->nullable();
            $table->foreignId('body_type_id')->nullable();
            $table->foreignId('status')->default(0);
            $table->foreignId('contractor_id')->nullable();
            $table->foreignId('carrier_id')->nullable();
            $table->foreignId('payment_method_id')->nullable();
            $table->foreignId('performer_payment_method_id')->nullable();
            $table->foreignId('carrier_driver_id')->nullable();
            $table->foreignId('responsible_user_id')->nullable();
            $table->foreignId('vehicle_id')->nullable();
            $table->foreignId('trailer_id')->nullable();
            $table->foreignId('profile_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
