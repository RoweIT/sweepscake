<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Series extends Model
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_COMPLETE = 'complete';

    use HasFactory;

    protected $guarded = [];

    public function bakers(): HasMany
    {
        return $this->hasMany(Baker::class);
    }

    public function weeks(): HasMany
    {
        return $this->hasMany(Week::class);
    }

    public function sweepscakes(): HasMany
    {
        return $this->hasMany(Sweepscake::class);
    }

    /**
     * Repository style function. Consider moving to a Repository class.
     *
     * Find a Series given a slug
     * @param int $username the slug to find
     * @return Series|null the Series record, or null if not found
     */
    public static function findBySlug(string $slug): Series|null
    {
        return self::where('slug', '=', $slug)->first();
    }

}
