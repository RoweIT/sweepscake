<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    public function bakers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Baker::class);
    }

    public function sweepscakes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Sweepscake::class);
    }
}
