<?php

namespace App\Models\User;

trait AttributesTrait
{
    /**
     * Get the user role name.
     *
     * @return string
     */
    public function getRoleNameAttribute(): string
    {
        return $this->roles->first()->name;
    }
}
