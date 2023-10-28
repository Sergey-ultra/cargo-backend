<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverTableSeeder extends Seeder
{
    public function run(): void
    {
        Driver::query()->truncate();
        Driver::factory(50)->create();
    }
}
