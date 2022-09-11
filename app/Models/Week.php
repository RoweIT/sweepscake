<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Week extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function starBaker(): HasOne
    {
        return $this->hasOne(Baker::class, 'baker_id', 'star_baker');
    }

    public function eliminated(): HasOne
    {
        return $this->hasOne(Baker::class, 'baker_id', 'eliminated');
    }
}
