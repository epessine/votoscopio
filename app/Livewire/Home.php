<?php

namespace App\Livewire;

use App\Support\GetData;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * @property-read array $years
 * @property-read array $states
 * @property-read array $cities
 */
class Home extends Component
{
    public string $year = '';

    public string $state = '';

    public string $city = '';

    #[Computed]
    public function years(): array
    {
        return GetData::years();
    }

    #[Computed]
    public function states(): array
    {
        if (isset($this->year)) {
            return GetData::states($this->year);
        }

        return [];
    }

    #[Computed]
    public function cities(): array
    {
        if (isset($this->year) && isset($this->state)) {
            return GetData::cities($this->year, $this->state);
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
            'view-data',
            [$this->year, $this->state, str($this->city)->slug()->toString()],
            navigate: true,
        );
    }

    public function render()
    {
        return view('livewire.home')->title(config('app.name'));
    }
}
