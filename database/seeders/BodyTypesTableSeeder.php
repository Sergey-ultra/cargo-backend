<?php

namespace Database\Seeders;

use App\Models\BodyType;
use Illuminate\Database\Seeder;

class BodyTypesTableSeeder extends Seeder
{
    public function run(): void
    {
        BodyType::query()->truncate();
        BodyType::factory(10)->create();
    }
}
