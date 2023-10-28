<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('lists')->insert([
            ['name' => 'Payment method'],
            ['name' => 'Body type'],
            ['name' => 'Cargo name'],
            ['name' => 'Load type'],
            ['name' => 'Unload type'],
            ['name' => 'Invoice is sent'],
            ['name' => 'ADR'],
            ['name' => 'Package'],
            ['name' => 'Transportation method'],
            ['name' => 'Consumption type'],
            ['name' => 'Application status'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lists');
    }
};
