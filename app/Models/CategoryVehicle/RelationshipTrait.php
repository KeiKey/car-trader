<?php

namespace App\Models\CategoryVehicle;

use App\Models\Category\Category;
use App\Models\Vehicle\Vehicle;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait RelationshipTrait
{
    /**
     * Return the Vehicle that has the CategoryVehicle.
     *
     * @return BelongsTo
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Return the Category that has the CategoryVehicle.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
