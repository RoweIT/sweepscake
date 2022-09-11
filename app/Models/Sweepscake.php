<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sweepscake extends Model
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

    public function sweepscakeUserBaker(): HasMany
    {
        return $this->hasMany(SweepscakeUserBaker::class);
    }

    /**
     * Relationship between Sweepscakes and Users. A User may have one or more Bakers for a given Sweepscake so a User
     * may appear more than once in a Sweepscake, hence the distinct.
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, SweepscakeUserBaker::class)->distinct();
    }

    /**
     * Relationship between Sweepscakes and Bakers. A User may have one or more Bakers for a given Sweepscake but
     * a Baker should only appear once in a Sweepscake.
     * @return BelongsToMany
     */
    public function bakers(): BelongsToMany
    {
        return $this->belongsToMany(Baker::class, SweepscakeUserBaker::class);
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    /**
     * Repository style function. Consider moving to a Repository class.
     *
     * Find all the bakers available for a given Sweepscake
     * @return Collection a collection of Baker
     */
    public function findAllBakersForSeries(): Collection
    {
        return $this->series->bakers;
    }
}
