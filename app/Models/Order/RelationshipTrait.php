<?php

namespace App\Models\Order;

use App\Models\User\User;
use App\Models\Vehicle\Vehicle;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait RelationshipTrait
{
    /**
     * Return the Vehicles that belong to the Order.
     *
     * @return BelongsToMany
     */
    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class)->withTimestamps()->withPivot('quantity');
    }

    /**
     * Return the Purchaser that has the Order.
     *
     * @return BelongsTo
     */
    public function purchaser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'purchased_by');
    }
}
