<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormBlocksTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('form_blocks')->insert([
            [
                'slug' => 'order',
            ],
            [
                'slug' => 'finance',
            ],
            [
                'slug' => 'cargoParameters',
            ],
            [
                'slug' => 'route',
            ],
        ]);
    }
}
