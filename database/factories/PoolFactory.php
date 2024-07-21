<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pool>
 */
class PoolFactory extends Factory
{
    public function definition(): array
    {
        return [
            'city_id' => City::factory(),
            'organization' => fake()->company(),
            'code' => fake()->uuid(),
            'source' => fake()->url(),
            'date' => fake()->date(),
            'nulls' => fake()->randomFloat(2, 0, 100),
            'no_response' => fake()->randomFloat(2, 0, 100),
            'year' => fake()->year(),
        ];
    }
}
