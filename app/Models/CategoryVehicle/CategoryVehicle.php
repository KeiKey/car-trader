<?php

namespace App\Models\CategoryVehicle;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property mixed id
 * @property mixed category_id
 * @property mixed vehicle_id
 * @property mixed extra
 */
class CategoryVehicle extends Pivot
{
    use RelationshipTrait,
        AttributesTrait,
        ScopesTrait;

    protected $table = 'category_vehicle';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'extra'
    ];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
