<?php

namespace App\Models\Vehicle;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
}
