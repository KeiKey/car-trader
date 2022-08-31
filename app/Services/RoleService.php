<?php

namespace App\Services;

use Exception;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleService
{
    /**
     * Create a new role and attach the selected permissions to it.
     *
     * @param array $roleData
     * @return Role
     */
    public function createRole(array $roleData): Role
    {
        return DB::transaction(function () use ($roleData) {
            /** @var Role $role */
            $role = Role::query()->create(['name' => $roleData['name']]);

            return $role->givePermissionTo($roleData['permissions']);
        });
    }

    /**
     * Update an existing role and its permissions.
     *
     * @param Role $role
     * @param array $roleData
     * @return Role
     */
    public function updateRole(Role $role, array $roleData): Role
    {
        return DB::transaction(function () use ($role, $roleData) {
            $role->update(['name' => $roleData['name']]);

            return $role->syncPermissions($roleData['permissions']);
        });
    }

    /**
     * Delete a role.
     *
     * @param Role $role
     * @return void
     * @throws Exception
     */
    public function deleteRole(Role $role): void
    {
        if ($role->non_deletable) {
            throw new Exception('Role is non deletable');
        }

        $role->delete();
    }
}
