<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FreeCompanyMember extends Model
{
    use HasFactory;

    /**
     * Get the Free Company of the member.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(FreeCompany::class);
    }
}
