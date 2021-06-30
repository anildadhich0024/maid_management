<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRoles;

class UserRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRoles::insert([
            'role_id'        => 1,
            'user_id'        => 1,
        ]);
        UserRoles::insert([
            'role_id'        => 2,
            'user_id'        => 2,
        ]);
        UserRoles::insert([
            'role_id'        => 2,
            'user_id'        => 3,
        ]);
        UserRoles::insert([
            'role_id'        => 2,
            'user_id'        => 4,
        ]);
        UserRoles::insert([
            'role_id'        => 2,
            'user_id'        => 5,
        ]);
        UserRoles::insert([
            'role_id'        => 2,
            'user_id'        => 6,
        ]);
        UserRoles::insert([
            'role_id'        => 2,
            'user_id'        => 7,
        ]);
        UserRoles::insert([
            'role_id'        => 3,
            'user_id'        => 8,
        ]);
        UserRoles::insert([
            'role_id'        => 3,
            'user_id'        => 9,
        ]);
        UserRoles::insert([
            'role_id'        => 3,
            'user_id'        => 10,
        ]);
    }
}
