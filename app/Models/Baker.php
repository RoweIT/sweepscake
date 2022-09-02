<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Baker extends Model
{
    use HasFactory;

    /**
     * Find all the bakers available for a given sweepscake
     * @param int $sweepscakeId the sweepscake to find bakers for
     * @return Collection a collection of bakers
     */
    public static function findAllForSweepscake(int $sweepscakeId): Collection
    {
        return Baker::join('series', 'series.id', '=', 'bakers.series_id')
            ->join('sweepscakes', 'series.id', '=', 'sweepscakes.series_id')
            ->where('sweepscakes.id', '=', $sweepscakeId)
            ->get(['bakers.*']);

    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function sweepscakeUser(): BelongsToMany
    {
        return $this->belongsToMany(SweepscakeUser::class);
    }

}
