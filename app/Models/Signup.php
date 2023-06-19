<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Signup extends Model
{
    use HasFactory;

    /**
     * Get the event that owns the signup.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
