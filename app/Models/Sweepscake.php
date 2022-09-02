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

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(SweepscakeUser::class);
    }

    public function sweepscakeUser(): HasMany
    {
        return $this->hasMany(SweepscakeUser::class);
    }

    /**
     * Find all the bakers available for a given Sweepscake
     * @return Collection a collection of Baker
     */
    public function findAllBakersForSeries(): Collection
    {
        return $this->series()->firstOrFail()->bakers()->get();
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }
}