<?php

namespace App\Models\Category;

use App\Models\Vehicle\Vehicle;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait RelationshipTrait
{
    /**
     * Return the Vehicles that belong to the Category.
     *
     * @return HasMany
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
