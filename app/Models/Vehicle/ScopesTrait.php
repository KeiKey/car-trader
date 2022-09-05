<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method Builder active()
 * @method Builder forSearch(string $query)
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

    /**
     * Scope Vehicle by Search.
     *
     * @param Builder $builder
     * @param string $query
     * @return Builder
     */
    public function scopeForSearch(Builder $builder, ?string $query): Builder
    {
        return $builder->when($query, function($builder) use ($query) {
            $builder->where('model', 'LIKE', '%'.$query.'%')
                ->orWhere('model', 'LIKE', '%'.$query.'%')
                ->orWhere('color', 'LIKE', '%'.$query.'%')
                ->orWhere('serial_number', 'LIKE', '%'.$query.'%')
                ->orWhere('engine_size', 'LIKE', '%'.$query.'%');
        });
    }
}
