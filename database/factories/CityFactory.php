<?php

namespace Database\Factories;

use App\Enums\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->randomNumber(7, true),
            'name' => fake()->city(),
            'slug' => fn (array $attrs): string => str($attrs['name'])->slug(),
            'state' => fake()->randomElement(State::cases()),
        ];
    }
}
