<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FreeCompany extends Model
{
    use HasFactory;

    /**
     * Get the members for the Free Company.
     */
    public function members(): HasMany
    {
        return $this->hasMany(FreeCompanyMember::class);
    }
}
