<?php

namespace App\Models\Category;

use App\Models\Car\Vehicle;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait RelationshipTrait
{
    public function categoryOptions(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
