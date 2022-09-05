<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::transaction(function () {
            /** @var User $user */
            $user = User::query()->create([
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'password' => Hash::make('Admin123$'),
            ]);

            $user->assignRole('super-admin');

            return $user;
        });
    }
}
