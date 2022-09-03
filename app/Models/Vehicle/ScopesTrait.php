<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method Builder active()
 */
trait ScopesTrait
{
    /**
     * Scope Vehicle that are active.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->whereNull('deactivated_at');
    }
}
