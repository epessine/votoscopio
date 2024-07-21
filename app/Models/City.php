<?php

namespace App\Models;

use App\Enums\State;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $id
 * @property int $code
 * @property string $name
 * @property string $slug
 * @property State $state
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Collection<int, Pool> $pools
 *
 * @method static \Database\Factories\CityFactory factory($count = null, $state = [])
 */
class City extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'state' => State::class,
        ];
    }

    public function pools(): HasMany
    {
        return $this->hasMany(Pool::class);
    }

    public function scopeFromUrl(Builder $query, int $year, State $state, string $citySlug): Builder
    {
        return $query->with('pools', fn (HasMany $query): HasMany => $query
            ->with('candidates')
            ->where('year', $year)
            ->orderBy('date'))
            ->whereRelation('pools', 'year', $year)
            ->where('slug', $citySlug)
            ->where('state', $state);
    }
}
