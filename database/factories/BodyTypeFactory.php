<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BodyTypeFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
