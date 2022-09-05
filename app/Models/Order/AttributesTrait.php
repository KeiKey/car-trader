<?php

namespace App\Models\Order;

trait AttributesTrait
{
    /**
     * Get the order state.
     *
     * @return string
     */
    public function getStateAttribute(): string
    {
        return $this->canceled_at ? 'canceled' : 'open' ;
    }
}
