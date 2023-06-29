<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * Get the channel that owns the event.
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    /**
     * Get the Signups for the scheduled raid.
     */
    public function signups(): HasMany
    {
        return $this->hasMany(Signup::class);
    }


    /**
     * Get the date of event.
     */
    public function date(): string 
    {
        return \Carbon\Carbon::parse($this->startTime)->format('jS F');
    }

    /**
     * Get the time of event.
     */
    public function time(): string 
    {
        return \Carbon\Carbon::parse($this->startTime)->format('H:i')." UTC";
    }

    /**
     * Whether the event is full or not.
     */
    public function isFull(): bool
    {
        return count($this->signups()) >= 8;
    }

    /**
     * Whether the event is open or not.
     */
    public function isOpen(): bool
    {
        return $this->startTime >= time();
    }
}
