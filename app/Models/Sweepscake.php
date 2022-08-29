<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sweepscake extends Model
{
    use HasFactory;

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->using(SweepscakeUser::class);
    }
}
