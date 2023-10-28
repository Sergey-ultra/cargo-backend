<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{

    public function definition(): array
    {
        return [
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'second_name' => $this->faker->firstName(),
            'phone' => $this->faker->phoneNumber(),
            'carrier_id' => $this->faker->randomNumber(2),
            'responsible_user_id' => $this->faker->randomNumber(2),
            'document_serial' => $this->faker->randomNumber(4),
            'document_number' => $this->faker->randomNumber(6),
            'department_code' => 1,
            'note' => 'default note'
        ];
    }
}
