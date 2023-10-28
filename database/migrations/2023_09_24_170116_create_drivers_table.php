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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('phone', 20)->nullable();
            $table->foreignId('carrier_id')->nullable();
            $table->foreignId('responsible_user_id')->nullable();
            $table->unsignedSmallInteger('document_serial')->nullable();
            $table->unsignedInteger('document_number')->nullable();
            $table->unsignedSmallInteger('department_code')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
