<?php

namespace Database\Seeders;

use App\Services\AuthService;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        (new AuthService())->saveUser('maasa@list.ru', '12345678', 'Sergey');
    }
}
