<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormFieldsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('form_fields')->insert([
            [
                'block_id' => 1,
                'field' => 'contractor_id',
                'slug' => 'contractor',
                'type' => 0,
                'list_id' => null,
                'group' => 0,
                'order' => 0,
            ],
            [
                'block_id' => 1,
                'field' => 'created_at',
                'slug' => 'orderDate',
                'type' => 1,
                'list_id' => null,
                'group' => 0,
                'order' => 1,
            ],
            [
                'block_id' => 1,
                'field' => 'driver',
                'slug' => 'driver',
                'type' => 0,
                'list_id' => null,
                'group' => 0,
                'order' => 2,
            ],
            [
                'block_id' => 1,
                'field' => 'carrier_id',
                'slug' => 'carrier',
                'type' => 0,
                'list_id' => null,
                'group' => 0,
                'order' => 3,
            ],
            [
                'block_id' => 1,
                'field' => 'responsible_user_id',
                'slug' => 'responsible',
                'type' => 0,
                'list_id' => null,
                'group' => 0,
                'order' => 4,
            ],
            [
                'block_id' => 1,
                'field' => 'application_number',
                'slug' => 'applicationNumber',
                'type' => 3,
                'list_id' => null,
                'group' => 0,
                'order' => 5,
            ],
            [
                'block_id' => 1,
                'field' => 'price',
                'slug' => 'price',
                'type' => 3,
                'list_id' => null,
                'group' => 1,
                'order' => 0,
            ],
            [
                'block_id' => 1,
                'field' => 'performer_amount',
                'slug' => 'performerAmount',
                'type' => 3,
                'list_id' => null,
                'group' => 1,
                'order' => 1,
            ],
            [
                'block_id' => 1,
                'field' => 'performer_payment_method_id',
                'slug' => 'performerPaymentMethod',
                'type' => 0,
                'list_id' => null,
                'group' => 1,
                'order' => 2,
            ],
            [
                'block_id' => 1,
                'field' => 'payment_method_id',
                'slug' => 'paymentMethod',
                'type' => 0,
                'list_id' => 1,
                'group' => 1,
                'order' => 3,
            ],
            [
                'block_id' => 1,
                'field' => 'performer_is_paid',
                'slug' => 'performerIsPaid',
                'type' => 5,
                'list_id' => null,
                'group' => 1,
                'order' => 4,
            ],

        ]);
    }
}
