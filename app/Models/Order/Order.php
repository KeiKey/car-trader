<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed id
 * @property mixed purchased_by
 * @property mixed canceled_at
 * @property mixed canceled_by
 */
class Order extends Model
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
        'purchased_by',
        'canceled_at',
        'canceled_by',
    ];

    protected $casts = [
        'canceled_at' => 'timestamp',
    ];
}
