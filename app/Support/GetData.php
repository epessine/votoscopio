<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

class GetData
{
    public static function years(): array
    {
        return Cache::remember('app-years', null, fn (): array => self::scandir('data'));
    }

    public static function states(string $year): array
    {
        if (!in_array($year, self::years())) {
            return [];
        }

        return Cache::remember("app-$year-states", null, fn (): array => self::scandir("data/$year"));
    }

    public static function cities(string $year, string $state): array
    {
        if (!in_array($state, self::states($year))) {
            return [];
        }

        return Cache::remember(
            "app-$year-$state-cities",
            null,
            function () use ($year, $state): array {
                $json = file_get_contents(base_path("data/$year/$state/cities.json"));

                if (!json_validate($json ?: '')) {
                    return [];
                }

                $data = json_decode($json, flags: JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);

                return array_map(fn (object $cityData): string => $cityData->name, $data);
            },
        );
    }

    public static function citySlugs(string $year, string $state): array
    {
        return Cache::remember(
            "app-$year-$state-city-slugs",
            null,
            fn (): array => array_map(fn (string $name): string => str($name)->slug()->toString(), self::cities($year, $state)),
        );
    }

    public static function city(string $year, string $state, string $citySlug): array|bool
    {
        if (!in_array($citySlug, self::citySlugs($year, $state))) {
            return false;
        }

        return Cache::remember(
            "app-$year-$state-$citySlug-data",
            null,
            function () use ($year, $state, $citySlug): array|bool {
                $json = file_get_contents(base_path("data/$year/$state/cities.json"));

                if (!json_validate($json ?: '')) {
                    return false;
                }

                $data = json_decode($json, flags: JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);

                $cityInfo = collect($data)->first(fn (object $cityData): bool => str($cityData->name)->slug()->toString() === $citySlug);

                $json = file_get_contents(base_path("data/$year/$state/{$cityInfo->file}"));

                if (!json_validate($json ?: '')) {
                    return false;
                }

                return array_merge(json_decode($json, true, flags: JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK), [
                    'name' => $cityInfo->name,
                    'year' => $year,
                    'state' => strtoupper($state),
                ]);
            },
        );
    }

    private static function scandir(string $path): array
    {
        return array_values(array_diff(scandir(base_path($path)), ['.', '..']));
    }
}
