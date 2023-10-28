<?php

namespace Database\Factories;

use App\Models\BodyType;
use App\Models\Contractor;
use App\Models\Driver;
use App\Models\Order;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
       return [
           'contractor_id' => Contractor::all()->random()->id,
           'carrier_driver_id' => Driver::all()->random()->id,
           'payment_method_id' => PaymentMethod::all()->random()->id,
           'performer_payment_method_id' => PaymentMethod::all()->random()->id,
           'body_type_id' => BodyType::all()->random()->id,
           'carrier_id' => $this->faker->randomNumber(2),
           'responsible_user_id' => $this->faker->randomNumber(2),
           'vehicle_id' => $this->faker->randomNumber(2),
           'trailer_id' => $this->faker->randomNumber(2),
           'profile_id' => $this->faker->randomNumber(2),
           'download_address' => $this->faker->address(),
           'download_date' => $this->faker->dateTime(),
           'uploading_address' => $this->faker->address(),
           'unloading_date' => $this->faker->dateTime(),
           'cargo_weight' => $this->faker->numberBetween(100, 10000),
           'cargo_volume' => $this->faker->numberBetween(100, 10000),
           'cargo_name' => $this->faker->name(),
           'application_number' => $this->faker->randomNumber(2),
           'invoice_number' => $this->faker->randomNumber(2),
           'invoice_is_sent' => $this->faker->boolean,
           'invoice_payment_date' => $this->faker->dateTime,
           'management_payment' => $this->faker->numberBetween(100, 10000),
           'status' => 0,
           'price' => $this->faker->randomNumber(4),
           'performer_is_paid' => $this->faker->boolean(),
           'performer_amount' => $this->faker->randomNumber(4),
           'user_id' => 1,
       ];
    }


}
