<?php

namespace App\Livewire;

use App\Enums\State;
use App\Models\Candidate;
use App\Models\City;
use App\Models\Pool;
use Axis\Attributes\Axis;
use Axis\Chart;
use Axis\Charts\ChartJs;
use Illuminate\Support\Collection;
use Livewire\Component;

class CityPage extends Component
{
    public City $city;

    public Collection $candidates;

    public int $year;

    public function mount(string $year, State $state, string $citySlug): void
    {
        $this->year = $year;

        $this->city = City::query()
            ->fromUrl($year, $state, $citySlug)
            ->firstOrFail();

        $this->candidates = $this->city->pools
            ->pluck('candidates')
            ->flatten()
            ->unique('id')
            ->sortBy('name');
    }

    #[Axis]
    public function estimulatedVotes(): ChartJs
    {
        $labels = $this->city->pools->map(fn (Pool $pool): string => "{$pool->organization} ({$pool->date->toDateString()})");

        $chart = Chart::chartjs()
            ->line()
            ->labels($labels);

        /** @var Candidate */
        foreach ($this->candidates as $candidate) {
            $chart->series($candidate->name, $candidate->votes($this->city));
        }

        return $chart;
    }

    public function render()
    {
        return view('livewire.city-page');
    }
}
