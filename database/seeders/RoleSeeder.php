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
        $roles = [
            ['name' => 'super-admin', 'non_deletable' => true, 'guard_name' => 'web'],
            ['name' => 'admin',       'non_deletable' => true, 'guard_name' => 'web'],
            ['name' => 'customer',    'non_deletable' => true, 'guard_name' => 'web'],
        ];

        Role::query()->insert($roles);
    }
}
