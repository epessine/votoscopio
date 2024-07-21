<?php

namespace App\Console\Commands;

use App\Enums\State;
use App\Models\Candidate;
use App\Models\City;
use App\Models\Pool;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SeedPools extends Command
{
    protected $signature = 'app:seed-pools';

    protected $description = 'Seed db with json data';

    public function handle(): int
    {
        $years = $this->scandir('pools');

        foreach ($years as $year) {
            $states = $this->scandir("pools/$year");

            foreach ($states as $state) {
                $cities = $this->scandir("pools/$year/$state");

                foreach ($cities as $city) {
                    $cityData = json_decode(file_get_contents(database_path("pools/$year/$state/$city")), true);

                    /** @var City */
                    $city = City::query()->create([
                        'name' => $cityData['name'],
                        'code' => $cityData['code'],
                        'state' => State::from($state),
                    ]);

                    /** @var Pool[] */
                    $pools = [];

                    foreach ($cityData['pools'] as $pool) {
                        $pools[] = Pool::query()->create([
                            'city_id' => $city->id,
                            'organization' => $pool['org'],
                            'code' => $pool['id'],
                            'source' => $pool['source'],
                            'date' => Carbon::createFromFormat('d/m/Y', $pool['date']),
                            'nulls' => $pool['votes_estimulated']['nulls'],
                            'no_response' => $pool['votes_estimulated']['no_response'],
                            'year' => $year,
                        ]);
                    }

                    foreach ($cityData['candidates'] as $rawCandidate) {
                        /** @var Candidate */
                        $candidate = Candidate::query()->create([
                            'name' => $rawCandidate['name'],
                            'party' => $rawCandidate['party'],
                            'year' => $year,
                        ]);

                        foreach ($cityData['pools'] as $index => $rawPool) {
                            /** @var float */
                            $percentage = collect($rawPool['votes_estimulated']['candidates'])
                                ->firstWhere('candidate_id', $rawCandidate['id'])['percentage'] ?? 0;

                            $candidate->pools()->attach($pools[$index], ['percentage' => $percentage]);
                        }
                    }
                }
            }
        }

        return self::SUCCESS;
    }

    public static function scandir(string $path): array
    {
        return array_values(array_diff(scandir(database_path($path)), ['.', '..']));
    }
}
