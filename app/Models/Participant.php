<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    public function sweepscakes()
    {
        return $this->belongsToMany(Sweepscake::class)->using(ParticipantSweepscake::class);
    }
}
