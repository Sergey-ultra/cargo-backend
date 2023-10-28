<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContractorFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'full_name' => $this->faker->company(),
        ];
    }
}
