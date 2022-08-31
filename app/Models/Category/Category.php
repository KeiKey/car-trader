<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        'name'
    ];
}
