<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Series extends Model
{
    use HasFactory;

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
}
