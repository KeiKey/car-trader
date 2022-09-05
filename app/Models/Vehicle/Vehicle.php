<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed id
 * @property mixed serial_number
 * @property mixed make
 * @property mixed model
 * @property mixed engine_size
 * @property mixed color
 * @property mixed production_year
 * @property mixed price
 * @property mixed quantity
 * @property mixed deactivated_at
 * @property mixed deactivated_by
 */
class Vehicle extends Model
{
    use RelationshipTrait,
        AttributesTrait,
        ScopesTrait,
        SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'serial_number',
        'make',
        'model',
        'engine_size',
        'color',
        'production_year',
        'price',
        'quantity',
        'deactivated_at'
    ];

    protected $casts = [
        'deactivated_at' => 'timestamp',
    ];
}
