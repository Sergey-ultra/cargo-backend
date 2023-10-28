<?php

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        Order::query()->truncate();
        Order::factory(50)->create();
    }
}
