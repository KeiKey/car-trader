<?php

namespace App\Models\Car;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use RelationshipTrait,
        AttributesTrait,
        ScopesTrait;

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
        'bought_at',
        'buyer_id',
        'deactivated_at'
    ];

    protected $casts = [
        'bought_at'      => 'timestamp',
        'deactivated_at' => 'timestamp',
    ];
}
