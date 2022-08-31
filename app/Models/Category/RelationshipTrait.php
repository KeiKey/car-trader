<?php

namespace App\Models\Category;

use App\Models\Vehicle\Vehicle;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait RelationshipTrait
{
    public function categoryOptions(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
