<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'bought_at',
        'buyer_id',
        'deactivated_at'
    ];

    protected $casts = [
        'bought_at'      => 'timestamp',
        'deactivated_at' => 'timestamp',
    ];
}
