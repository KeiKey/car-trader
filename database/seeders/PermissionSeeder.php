<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'manage_users',      'guard_name' => 'web'],
            ['name' => 'manage_roles',      'guard_name' => 'web'],
            ['name' => 'manage_vehicles',   'guard_name' => 'web'],
            ['name' => 'manage_categories', 'guard_name' => 'web'],
            ['name' => 'manage_orders',     'guard_name' => 'web'],
        ];

        Permission::query()->insert($permissions);
    }
}
