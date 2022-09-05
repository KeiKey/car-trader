<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->updateOrCreate(['name' => 'super-admin', 'non_deletable' => true, 'guard_name' => 'web']);
        Role::query()->updateOrCreate(['name' => 'admin',       'non_deletable' => true, 'guard_name' => 'web']);
        Role::query()->updateOrCreate(['name' => 'customer',    'non_deletable' => true, 'guard_name' => 'web']);
    }
}
