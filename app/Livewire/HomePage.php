<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Pool;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * @property-read array $years
 * @property-read array $states
 * @property-read array $cities
 */
class HomePage extends Component
{
    public string $year = '';

    public string $state = '';

    public string $city = '';

    #[Computed]
    public function years(): array
    {
        return Pool::query()
            ->distinct('year')
            ->orderBy('year')
            ->pluck('year')
            ->all();
    }

    #[Computed]
    public function states(): array
    {
        if (isset($this->year)) {
            return City::query()
                ->distinct('state')
                ->whereRelation('pools', 'year', $this->year)
                ->orderBy('state')
                ->pluck('state')
                ->all();
        }

        return [];
    }

    #[Computed]
    public function cities(): array
    {
        if (isset($this->year) && isset($this->state)) {
            return City::query()
                ->where('state', $this->state)
                ->whereRelation('pools', 'year', $this->year)
                ->orderBy('name')
                ->get()
                ->all();
        }

        return [];
    }

    public function enter(): void
    {
        $this->validate([
            'year' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

        $this->redirectRoute(
            'city-page',
            [$this->year, $this->state, $this->city],
            navigate: true,
        );
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
