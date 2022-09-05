<?php

namespace App\Models\Vehicle;

trait AttributesTrait
{
    /**
     * Get if the vehicle is active.
     *
     * @return bool
     */
    public function getActiveAttribute(): bool
    {
        return !$this->deactivated_at;
    }
}
