<?php

use App\Enums\State;
use App\Livewire\HomePage;
use App\Models\City;
use App\Models\Pool;

use function Pest\Livewire\livewire;

test('it should render', function () {
    livewire(HomePage::class)->assertOk();
});

test('it should render years', function () {
    $pools = Pool::factory(10)->create();

    livewire(HomePage::class)->assertOk()
        ->assertSeeInOrder($pools->pluck('year')->unique()->sort()->all());
});

test('it should render states', function () {
    $cities = City::factory(10)
        ->has(Pool::factory(2)->state(['year' => 2024]))
        ->create();

    livewire(HomePage::class)->assertOk()
        ->set('year', 2024)
        ->assertSeeHtmlInOrder($cities
            ->pluck('state')
            ->map(fn (State $state): string => "value=\"{$state->value}\"")
            ->sort(SORT_NATURAL)
            ->unique()
            ->all());
});

test('it should render cities', function () {
    $cities = City::factory(10)
        ->has(Pool::factory(2)->state(['year' => 2024]))
        ->create();

    $city = $cities->random();

    livewire(HomePage::class)->assertOk()
        ->set('year', 2024)
        ->set('state', $city->state->value)
        ->assertSeeHtmlInOrder($cities
            ->where('state', $city->state)
            ->sortBy('name', SORT_NATURAL)
            ->pluck('name')
            ->unique()
            ->all());
});
