<?php

namespace App\Livewire;

use App\Support\GetData;
use Axis\Attributes\Axis;
use Axis\Chart;
use Axis\Charts\ChartJs;
use Carbon\Carbon;
use Livewire\Component;

class City extends Component
{
    public array $data;

    public function mount(string $year, string $state, string $city): void
    {
        $data = GetData::city($year, $state, $city);

        abort_if(!$data, 404);

        $this->data = $data;
    }

    #[Axis]
    public function estimulatedVotes(): ChartJs
    {
        $pools = collect($this->data['pools'])
            ->where('votes_estimulated')
            ->sortBy(fn (array $pool): Carbon => Carbon::createFromFormat('d/m/Y', $pool['date']));

        $chart = Chart::chartjs()->line()->labels($pools->pluck('org'));

        foreach ($this->data['candidates'] as $candidate) {
            $data = $pools
                ->pluck('votes_estimulated.candidates')
                ->map(fn (array $votes): float => collect($votes)
                    ->firstWhere('candidate_id', $candidate['id'])['percentage'] ?? 0);

            $chart->series($candidate['name'], $data);
        }

        return $chart;
    }

    public function render()
    {
        return view('livewire.city')
            ->title("{$this->data['name']} - {$this->data['state']} ({$this->data['year']}) | "
                . config('app.name'));
    }
}
