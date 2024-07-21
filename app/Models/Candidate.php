<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $id
 * @property string $name
 * @property string $party
 * @property int $year
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Collection<int, Pool> $pools
 *
 * @method static \Database\Factories\CandidateFactory factory($count = null, $state = [])
 */
class Candidate extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function pools(): BelongsToMany
    {
        return $this->belongsToMany(Pool::class)->withPivot('percentage');
    }
}
