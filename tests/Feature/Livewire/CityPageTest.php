<?php

use App\Enums\State;
use App\Livewire\CityPage;
use App\Models\Candidate;
use App\Models\City;
use App\Models\Pool;

use function Pest\Livewire\livewire;

test('it should render', function () {
    $city = City::factory()
        ->has(Pool::factory(state: ['year' => 2024])
            ->hasAttached(Candidate::factory(3), ['percentage' => 5]))
        ->create(['state' => State::AC]);

    livewire(CityPage::class, [
        'year' => 2024,
        'state' => State::AC,
        'citySlug' => $city->slug,
    ])->assertSet('city.id', $city->id);
});
