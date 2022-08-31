<?php

namespace App\Models\User;

trait AttributesTrait
{

    /**
     * Chek weather user is Administrator!
     *
     * @return bool
     */
    public function isAdministrator()
    {
        return $this->roles()->where('name', 'Administrator')->exists();
    }


}
