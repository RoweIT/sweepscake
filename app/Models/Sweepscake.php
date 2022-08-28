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

    public function participants()
    {
        return $this->belongsToMany(Participant::class)->using(ParticipantSweepscake::class);
    }
}
