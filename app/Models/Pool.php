<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $id
 * @property int $city_id
 * @property string $organization
 * @property ?string $code
 * @property string $source
 * @property Carbon $date
 * @property float $nulls
 * @property float $no_response
 * @property int $year
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read City $city
 * @property-read Collection<int, Candidate> $candidates
 *
 * @method static \Database\Factories\PoolFactory factory($count = null, $state = [])
 */
class Pool extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function candidates(): BelongsToMany
    {
        return $this->belongsToMany(Candidate::class)->withPivot('percentage');
    }
}
