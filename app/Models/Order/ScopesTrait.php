<?php

namespace App\Models\Order;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;

trait ScopesTrait
{
    public function scopeForUser(Builder $builder, User $user): Builder
    {
        return $builder->where('purchased_by', $user->id);
    }
}
