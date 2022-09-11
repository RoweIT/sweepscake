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

    protected $guarded = [];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Repository style function. Consider moving to a Repository class.
     *
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

    /**
     * Repository style function. Consider moving to a Repository class.
     *
     * Find the baker with the given slug
     * @param int $slug the slug to find
     * @return Baker|null the baker found, or null if not found
     */
    public static function findBySlug(string $slug): Baker|null
    {
        return self::where('slug', '=', $slug)->first();
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function sweepscakeUserBaker(): HasMany
    {
        return $this->hasMany(SweepscakeUserBaker::class);
    }

    public function sweepscakes(): BelongsToMany
    {
        return $this->belongsToMany(Sweepscake::class, SweepscakeUserBaker::class);
    }
}
