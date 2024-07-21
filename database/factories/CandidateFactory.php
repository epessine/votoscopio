<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'party' => strtoupper(fake()->lexify('??')),
            'year' => fake()->year(),
        ];
    }
}
