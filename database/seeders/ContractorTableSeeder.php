<?php

namespace Database\Seeders;

use App\Models\Contractor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractorTableSeeder extends Seeder
{
    public function run(): void
    {
        Contractor::query()->truncate();
        Contractor::factory(50)->create();
    }
}
