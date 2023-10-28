<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ContractorTableSeeder::class);
        $this->call(DriverTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(BodyTypesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(FormBlocksTableSeeder::class);
        $this->call(FormFieldsTableSeeder::class);
    }
}
