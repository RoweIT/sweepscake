<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;

    public const TYPE_STAR_BAKER = 'star-baker';
    public const TECHNICAL_FIRST = 'technical-first';
    public const TECHNICAL_SECOND = 'technical-second';
    public const TECHNICAL_THIRD = 'technical-third';
    public const TECHNICAL_LAST = 'technical-last';
    public const ELIMINATED = 'eliminated';
    public const HANDSHAKES = 'handshakes';

    protected $guarded = [];

    public function series(): BelongsTo
    {
        return $this->belongsTo(Week::class);
    }

    public function baker(): BelongsTo
    {
        return $this->belongsTo(Baker::class);
    }
}
