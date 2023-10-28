<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{
    public function run(): void
    {
        PaymentMethod::query()->truncate();
        PaymentMethod::factory(7)->create();
    }
}
