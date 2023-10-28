<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'director',
                'code' => 'director',
                'description' => 'Возможность создавать все',
            ],
        ]);

        DB::table('role_user')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
            ],
        ]);
    }
}
