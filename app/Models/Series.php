<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    public function bakers()
    {
        return $this->hasMany(Baker::class);
    }

    public function sweepscakes()
    {
        return $this->hasMany(Sweepscake::class);
    }
}
