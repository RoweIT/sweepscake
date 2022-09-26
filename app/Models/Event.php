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
    public const TYPE_TECHNICAL_FIRST = 'technical-first';
    public const TYPE_TECHNICAL_SECOND = 'technical-second';
    public const TYPE_TECHNICAL_THIRD = 'technical-third';
    public const TYPE_TECHNICAL_LAST = 'technical-last';
    public const TYPE_ELIMINATED = 'eliminated';
    public const TYPE_HANDSHAKE = 'handshake';

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
