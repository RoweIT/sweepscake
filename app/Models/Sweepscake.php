<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sweepscake extends Model
{
    use HasFactory;

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(SweepscakeUser::class);
    }

    public function bakers(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Baker::class, SweepscakeUser::class);
    }

    public function series(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    /**
     * Find all the bakers available for a given Sweepscake
     * @return Collection a collection of Baker
     */
    public function findAllBakersForSeries(): Collection
    {
        return $this->series()->firstOrFail()->bakers()->get();

    }

}
