<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    /**
     * Get the events for this channel.
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Get the discord link for this channel.
     */
    public function link(): string
    {
        return 'https://discord.com/channels/'.env('DISCORD_SERVER_ID').'/'.$this->id;
    }
}
