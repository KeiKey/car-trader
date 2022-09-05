<?php

namespace App\Models\Vehicle;

use App\Models\Category\Category;
use App\Models\CategoryVehicle\CategoryVehicle;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait RelationshipTrait
{
    /**
     * Return the Categories that has the Vehicle.
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps()->withPivot('extra');
    }

    /**
     * Return the CategoryVehicles that belong to the Vehicle.
     *
     * @return HasMany
     */
    public function categoryVehicle(): HasMany
    {
        return $this->hasMany(CategoryVehicle::class);
    }
}
