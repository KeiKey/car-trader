<?php

namespace App\Models\Vehicle;

use App\Models\Category\Category;
use App\Models\CategoryVehicle\CategoryVehicle;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        return $this->belongsToMany(Category::class)->withTimestamps()->withPivot('quantity');
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

    /**
     * Return the User that has deactivated the Vehicle.
     *
     * @return BelongsTo
     */
    public function deactivator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
