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
        Permission::query()->updateOrCreate(['name' => 'manage_users',      'guard_name' => 'web']);
        Permission::query()->updateOrCreate(['name' => 'manage_roles',      'guard_name' => 'web']);
        Permission::query()->updateOrCreate(['name' => 'manage_vehicles',   'guard_name' => 'web']);
        Permission::query()->updateOrCreate(['name' => 'manage_categories', 'guard_name' => 'web']);
        Permission::query()->updateOrCreate(['name' => 'manage_orders',     'guard_name' => 'web']);
    }
}
