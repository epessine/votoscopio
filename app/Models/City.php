<?php

namespace App\Models;

use App\Enums\State;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property int $code
 * @property string $name
 * @property State $state
 * @property Carbon $created_at
 * @property Carbon $updated_at
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
}
