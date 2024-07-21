<?php

use App\Console\Commands\SeedPools;

test('all json files should be valid', function () {
    $years = SeedPools::scandir('pools');

    foreach ($years as $year) {
        $states = SeedPools::scandir("pools/$year");

        foreach ($states as $state) {
            $cities = SeedPools::scandir("pools/$year/$state");

            foreach ($cities as $city) {
                expect(json_validate(file_get_contents(database_path("pools/$year/$state/$city"))))->toBeTrue();
            }
        }
    }
});
