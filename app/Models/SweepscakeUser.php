<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SweepscakeUser extends Pivot
{

    public static function findAllForSweepscake(int $sweepscakeId): Collection
    {
        return self::where('sweepscakes.id', '=', $sweepscakeId);
    }

    public function sweepscake(): HasOne
    {
        return $this->hasOne(Sweepscake::class, 'id', 'swepscake_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function baker(): HasOne
    {
        return $this->hasOne(Baker::class, 'id', 'baker_id');
    }
}
